<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller {

    public function index() {
        $data = \DB::table('users')
        			->join('user_role','users.id','=','user_role.user_id')
        			->join('roles','user_role.role_id','=','roles.id')
        			->select('users.*','roles.id as role_id','roles.nama as kode','roles.description as role')
        			->get();
        $tipe = \DB::table('roles')->get();

        return view('users.user', [
            'data' => $data,
            'tipe' => $tipe,
        ]);
    }

    public function add(){
        $datatype = \DB::table('roles')->get();
        return view('users.useradd',[
                'datatype' => $datatype
            ]);
    }

    // register user / insert user
    public function insert(Request $req){
    	return \DB::transaction(function()use($req){

    		// insert new user to table users
    		$user_id = \DB::table('users')->insertGetId([
	           'username' => $req->addusername,
	           'email' => $req->addusername . '@localhost.com',
	           'password' => bcrypt($req->addpassword),
	           'verified' => 1,
	       ]);

    		// register user role
    		\DB::table('user_role')->insert([
    			'user_id' => $user_id,
    			'role_id' => $req->tipe,
    		]);

    		// $user = \DB::select('select users.id, users.username, roles.id as role_id , roles.nama as kode, roles.description as role
						// 			from users  
						// 			inner join user_role on users.id = user_role.user_id
						// 			inner join roles on user_role.role_id = roles.id
						// 			where users.id = ' . $user_id );

    		// echo json_encode($user[0]);

            return redirect('admin/user');
    	});

    }

    // tampilkan form edit user
    public function edit($id){
        $data = \DB::select('select users.*,user_role.role_id,roles.nama as role from users inner join user_role on user_role.user_id = users.id inner join roles on user_role.role_id = roles.id where users.id = ' . $id );

        $datatype = \DB::table('roles')->get();

        // echo json_encode($data);

        return view('users.useredit',[
                'data' => $data[0],
                'datatype' => $datatype
            ]);
    }

    //get data user
    public function getUser($id) {
        $data = \DB::select('select users.id, users.username, roles.id as role_id , roles.nama as kode, roles.description as role
									from users  
									inner join user_role on users.id = user_role.user_id
									inner join roles on user_role.role_id = roles.id
									where users.id = ' . $id );

        return json_encode($data[0]);
    }

    // update user
    public function updateUser(Request $req){
    	\DB::transaction(function()use($req){
    		// update username
			\DB::table('users')
	    	->where('id',$req->id)
	    	->update([
	    		'username' => $req->addusername
    		]);

    		// update password
    		if($req->addpassword != ""){
				\DB::table('users')
		    	->where('id',$req->id)
		    	->update([
		    		'password' => bcrypt($req->addpassword)
				]);    			
    		}

    		// update tipe
    		\DB::table('user_role')
    			->where('user_id',$req->id)
    			->update([
    					'role_id' => $req->tipe
    				]);
    	});


    	// $data = \DB::select('select users.id, users.username, roles.id as role_id , roles.nama as kode, roles.description as role
					// 				from users  
					// 				inner join user_role on users.id = user_role.user_id
					// 				inner join roles on user_role.role_id = roles.id
					// 				where users.id = ' . $req->id );

     //    return json_encode($data[0]);

        return redirect('admin/user');
    }

    // Hapus data user dengan POST
    public function delete($id){
    	\DB::table('users')->where('id',$id)->delete();

        return redirect('admin/user');
    }


}
