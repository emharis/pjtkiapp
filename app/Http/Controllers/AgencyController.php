<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AgencyController extends Controller {

    public function index() {
        $data = \DB::table('agency')
                    ->join('users','agency.user_id','=','users.id')
                    ->join('user_role','users.id','=','user_role.user_id')
                    ->join('roles','user_role.role_id','=','roles.id')
                    ->select('agency.*','users.username')
        			->get();

        return view('agency.agency', [
            'data' => $data,
        ]);
    }

    public function add(){
        return view('agency.agencyadd',[
            ]);
    }

    // register agency / insert agency
    public function insert(Request $req){
    	return \DB::transaction(function()use($req){
            // insert into user account
            $user_id = \DB::table('users')->insertGetId([
               'username' => $req->username,
               'email' => $req->addusername . '@localhost.com',
               'password' => bcrypt($req->password),
               'verified' => 1,
           ]);

            // register user role
            \DB::table('user_role')->insert([
                'user_id' => $user_id,
                'role_id' => 2,
            ]);

    		// insert new agency to table agency
    		$agency_id = \DB::table('agency')->insertGetId([
	           'nama' => $req->nama,
	           'kontak' => $req->kontak,
	           'alamat' => $req->alamat,
	           'telp' => $req->telp,
               'user_id' => $user_id
	       ]);

            return redirect('admin/agency');
    	});

    }

    // tampilkan form edit agency
    public function edit($id){
        $data = \DB::table('agency')
                    ->join('users','agency.user_id','=','users.id')
                    ->join('user_role','users.id','=','user_role.user_id')
                    ->join('roles','user_role.role_id','=','roles.id')
                    ->select('agency.*','users.id as user_id','users.username')
                    ->where(\DB::raw('agency.id'),'=',$id)
                    ->first();
        // echo json_encode($data);
        return view('agency.agencyedit',[
                'data' => $data,
            ]);
    }

    //get data agency
    public function getAgency($id) {
        $data = \DB::select('select agency.id, agency.agencyname, roles.id as role_id , roles.nama as kode, roles.description as role
									from agency  
									inner join agency_role on agency.id = agency_role.agency_id
									inner join roles on agency_role.role_id = roles.id
									where agency.id = ' . $id );

        return json_encode($data[0]);
    }

    // update agency
    public function update(Request $req){
    	return \DB::transaction(function()use($req){
            // update username
            \DB::table('users')
            ->where('id',$req->user_id)
            ->update([
                'username' => $req->username
            ]);

            // update password
            if($req->password != ""){
                \DB::table('users')
                ->where('id',$req->user_id)
                ->update([
                    'password' => bcrypt($req->password)
                ]);             
            }

    		// update agencyname
			\DB::table('agency')
	    	->where('id',$req->id)
	    	->update([
	    		'nama' => $req->nama,
               'kontak' => $req->kontak,
               'alamat' => $req->alamat,
               'telp' => $req->telp,
    		]);

		  return redirect('admin/agency');
    	});
    }

    // Hapus data agency dengan POST
    public function delete($id){
    	\DB::table('agency')->where('id',$id)->delete();

        return redirect('admin/agency');
    }


    // BAGIAN AGENCY
    public function profile(){
        $data = \Auth::user()->agency();

        return view('Agencys.profile',[
                'data' => $data
            ]);
    }

    public function profileUpdate(Request $req){
        echo 'update profile';
        \DB::table('agency')
            ->where('id',$req->id)
            ->update([
                    'nama' => $req->nama,
                    'kontak' => $req->kontak,
                    'alamat' => $req->alamat,
                    'telp' => $req->telp,
                ]);

        return redirect()->back();
    }

    public function promotedCtki(){
        $agency = \Auth::user()->agency();

        $data = \DB::table('ctki')
                        ->join('promote_ctki','promote_ctki.ctki_id','=','ctki.id')
                        ->where('promote_ctki.agency_id',$agency->id)
                        ->where('ctki.status_rekrut','N')
                        ->select('ctki.*')
                        ->get();

        return view('Agencys.promotedctki',[
                'agency' => $agency,
                'data' => $data
            ]);
    }

    public function showCtki($id){
        $data = \DB::table('ctki')->find($id);

        // echo json_encode($data);

        return view('Agencys.showctki',[
                'data' => $data
            ]);
    }

    public function recruit($id){
        
        return \DB::transaction(function()use($id){
            // update data ctki set status recruit dan agency_id yang merekrut
            \DB::table('ctki')
            ->where('id',$id)
            ->update([
                    'status_rekrut' => 'Y',
                    'agency_id' => \Auth::user()->agency()->id
                ]);

            // hapus data ctki dari table promote
            // \DB::table('promote_ctki')

            return redirect('agency/ctki');    
        });
        
    }

    public function recruited(){
        $data = \DB::table('ctki')
                ->where('agency_id',\Auth::user()->agency()->id)
                ->get();

        return view('Agencys.recruited',[
                'data' => $data
            ]);
    }

    public function refuse($id){
        
        return \DB::transaction(function()use($id){
            // hapus data ctki set status recruit dan agency_id yang merekrut 
            \DB::table('ctki')
            ->where('id',$id)
            ->update([
                    'status_rekrut' => 'N',
                    'agency_id' => 0
                ]);

            // hapus data ctki dari table promote
            // \DB::table('promote_ctki')

            return redirect('agency/recruited');    
        });
        
    }

    // END OF BAGIAN AGENCY


}
