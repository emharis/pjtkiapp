<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return \DB::table('roles')
                ->join('user_role','user_role.role_id','=','roles.id')
                ->where('user_role.user_id',$this->id)
                ->get();
    }

    public function role(){
        return \DB::table('roles')
                ->join('user_role','user_role.role_id','=','roles.id')
                ->where('user_role.user_id',$this->id)
                ->first();
    }

    public function agency(){
        return \DB::table('agency')->where('user_id',$this->id)->first();
    }

    public function ctki(){
        return \DB::table('ctki')->where('user_id',$this->id)->first();   
    }

}
