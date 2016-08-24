<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CtkiController extends Controller {

    public function index() {
        $data = \DB::table('ctki')
                    ->select('ctki.*',\DB::raw('(select count(*) from promote_ctki where promote_ctki.ctki_id = ctki.id) as agency'))
        			->get();

        return view('ctki.ctki', [
            'data' => $data,
        ]);
    }

    public function add(){
        return view('ctki.ctkiadd',[
            ]);
    }

    // register ctki / insert ctki
    public function insert(Request $req){
    	return \DB::transaction(function()use($req){

            // insert into user account
            $user_id = \DB::table('users')->insertGetId([
               'username' => $req->username,
               'email' => $req->username . '@localhost.com',
               'password' => bcrypt($req->password),
               'verified' => 1,
           ]);

            // register user role
            \DB::table('user_role')->insert([
                'user_id' => $user_id,
                'role_id' => 3,
            ]);

    		// insert new ctki to table ctki
    		$ctki_id = \DB::table('ctki')->insertGetId([
	           'nama' => $req->nama,
	           'nik' => $req->nik,
	           'jns_kelamin' => $req->jenis_kelamin,
               'tgl_lahir' => $req->tgl_lahir,
               'tempat_lahir' => $req->tempat_lahir,
               'alamat' => $req->alamat,
               'kota' => $req->kota,
               'provinsi' => $req->provinsi,
               'pendidikan_terakhir' => $req->pendidikan,
               'status_menikah' => $req->menikah,
               'agama' => $req->agama,
               'telp' => $req->telp,
               'email' => $req->email,
               'ayah' => $req->ayah,
               'ibu' => $req->ibu,
               'user_id' => $user_id,
            //    'visa' => $req->visa,
            //    'passport' => $req->passport,
	           // 'foto' => $req->foto,
	       ]);

            // cek file foto
            if($req->hasFile('foto')){
                if ($req->file('foto')->isValid()) {
                    // upload file ke folder
                    $file = $req->file('foto');
                    $namaFoto = 'foto_' . $req->username . '.' . $file->getClientOriginalExtension();
                    $file->move('foto', $namaFoto);

                    // update datababse
                    \DB::table('ctki')->where('id',$ctki_id)->update([
                            'foto' => $namaFoto
                        ]);
                }
            }

            return redirect('admin/ctki');
    	});

    }

    // tampilkan form edit ctki
    public function edit($id){
        $data = \DB::table('ctki')
                    ->join('users','ctki.user_id','=','users.id')
                    ->select('ctki.*','users.username')
                    ->where(\DB::raw('ctki.id'),$id)
                    ->first();

        // $agency = \DB::table('agency')->get();
        $agency = \DB::select("select agency.id, agency.nama,
                                (
                                    select count(*) from promote_ctki 
                                    where promote_ctki.agency_id = agency.id 
                                    and promote_ctki.ctki_id = " . $id . "
                                ) as promote
                                from agency");

        // echo json_encode($data);

        return view('ctki.ctkiedit',[
                'data' => $data,
                'agency' => $agency,
            ]);
    }

    //get data ctki
    public function getCtki($id) {
        $data = \DB::select('select ctki.id, ctki.ctkiname, roles.id as role_id , roles.nama as kode, roles.description as role
									from ctki  
									inner join ctki_role on ctki.id = ctki_role.ctki_id
									inner join roles on ctki_role.role_id = roles.id
									where ctki.id = ' . $id );

        return json_encode($data[0]);
    }

    // update ctki
    public function update(Request $req){
    	return \DB::transaction(function()use($req){
    		// update ctkiname
			\DB::table('ctki')
	    	->where('id',$req->id)
	    	->update([
	    		'nama' => $req->nama,
               'kontak' => $req->kontak,
               'alamat' => $req->alamat,
               'telp' => $req->telp,
    		]);

		  return redirect('admin/ctki');
    	});
    }

    // Hapus data ctki dengan POST
    public function delete($id){
    	\DB::table('ctki')->where('id',$id)->delete();

        return redirect('admin/ctki');
    }

    // Promot ctki ke agency
    public function promote(Request $req){
        echo 'Promote CTKI <br/>';
        echo $req->ctki_id . '<br/>';

        \DB::transaction(function()use($req){
            // delete data yang laa
            \DB::table('promote_ctki')
                ->where('ctki_id',$req->ctki_id)
                ->delete();

            // input data promote
            if($req->agency){
                foreach($req->agency as $dt){
                    \DB::table('promote_ctki')
                        ->insert([
                                'ctki_id' => $req->ctki_id,
                                'agency_id' => $dt
                            ]);
                }    
            }
        });

        return redirect()->back();
    }


    // Bagian CTKI
    public function profile(){
         $data = \Auth::user()->ctki();

        return view('calontki.profile',[
                'data' => $data,
                'user' => \Auth::user(),
            ]);
    }

    public function profileUpdate(Request $req){
        return \DB::transaction(function()use($req){
            $user = \Auth::user();
            // update ctkiname
            \DB::table('ctki')
            ->where('id',$req->id)
            ->update([
                'nama' => $req->nama,
                'nik' => $req->nik,
                'jns_kelamin' => $req->jenis_kelamin,
                'tgl_lahir' => $req->tgl_lahir,
                'tempat_lahir' => $req->tempat_lahir,
                'alamat' => $req->alamat,
                'kota' => $req->kota,
                'provinsi' => $req->provinsi,
                'pendidikan_terakhir' => $req->pendidikan,
                'status_menikah' => $req->menikah,
                'agama' => $req->agama,
                'telp' => $req->telp,
                'email' => $req->email,
                'ayah' => $req->ayah,
                'ibu' => $req->ibu,
            ]);

            // cek file foto
            if($req->hasFile('foto')){
                if ($req->file('foto')->isValid()) {
                    // upload file ke folder
                    $file = $req->file('foto');
                    $namaFoto = 'foto_' . $user->username . '.' . $file->getClientOriginalExtension();
                    $file->move('foto', $namaFoto);

                    // update datababse
                    \DB::table('ctki')->where('id',$req->id)->update([
                            'foto' => $namaFoto
                        ]);
                }
            }

            // cek file visa
            if($req->hasFile('visa')){
                if ($req->file('visa')->isValid()) {
                    // upload file ke folder
                    $file = $req->file('visa');
                    $namaFoto = 'visa_' . $user->username . '.' . $file->getClientOriginalExtension();
                    $file->move('visa', $namaFoto);

                    // update datababse
                    \DB::table('ctki')->where('id',$req->id)->update([
                            'visa' => $namaFoto
                        ]);
                }
            }

            // cek file paspor
            if($req->hasFile('paspor')){
                if ($req->file('paspor')->isValid()) {
                    // upload file ke folder
                    $file = $req->file('paspor');
                    $namaFoto = 'paspor_' . $user->username . '.' . $file->getClientOriginalExtension();
                    $file->move('paspor', $namaFoto);

                    // update datababse
                    \DB::table('ctki')->where('id',$req->id)->update([
                            'paspor' => $namaFoto
                        ]);
                }
            }

          return redirect('ctki/profile');
        });
    }
    // End Of Bagian CTKI


}
