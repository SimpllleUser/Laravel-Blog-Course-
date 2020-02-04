<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerForm(){
        return view('pages.register');
    }

    public function register(Request $request){
        // return view('pages.index');
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

       $user = User::add($request->all());
       $user->generatePassword($request->get('password'));

       return redirect(('/login'));
    }

    public function loginForm(){
        return view('pages.login');
    }
}
