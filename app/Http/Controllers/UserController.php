<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;

class User extends Controller
{

    public function login(Request $request){

        $attributes= request()->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:7|max:255'
        ]);

        $attributes['password']=bcrypt($attributes['password']);






    }
}
