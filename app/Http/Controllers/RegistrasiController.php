<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RegistrasiController extends Controller
{
	public function index(){
		return view('home');
	}

	public function regTki(){

		return view('registrasi.ctki');
	}

	public function saveRegTki(Request $req){
		// echo 'save register tki';

		return \DB::transaction(function()use($req){
			// create user account
			// insert into user account
            $user_id = \DB::table('users')->insertGetId([
               'username' => $req->username,
               'email' => $req->email,
               'password' => bcrypt($req->password),
               'verified' => 1,
           ]);

            // register user role
            \DB::table('user_role')->insert([
                'user_id' => $user_id,
                'role_id' => 3,
            ]);


			\DB::table('ctki')->insert([
					'nama' => $req->fullname,
					'user_id' => $user_id
				]);

			// loginkan user & buka halaman user profile
			//auth user
    		\Auth::attempt(['username' => $req->username, 'password' => $req->password]);
    		if (\Auth::check()) {
	            return redirect('home');
	        } else {
	            return redirect('login');
	        }

		});
	}


	// Registrasi Agency
	public function regAgency(){
		return view('registrasi.agency');
	}

	// simpan data registrasi agency
	public function saveRegAgency(Request $req){
		return \DB::transaction(function()use($req){
			// create user account
            $user_id = \DB::table('users')->insertGetId([
               'username' => $req->username,
               'email' => $req->email,
               'password' => bcrypt($req->password),
               'verified' => 1,
           ]);

            // register user role as agency
            \DB::table('user_role')->insert([
                'user_id' => $user_id,
                'role_id' => 2,
            ]);

            // input data agency
			\DB::table('agency')->insert([
					'nama' => $req->fullname,
					'kontak' => $req->kontak,
					'user_id' => $user_id
				]);

			// loginkan user & buka halaman user profile
			//auth user
    		\Auth::attempt(['username' => $req->username, 'password' => $req->password]);
    		if (\Auth::check()) {
	            return redirect('home');
	        } else {
	            return redirect('login');
	        }

		});
	}


}
