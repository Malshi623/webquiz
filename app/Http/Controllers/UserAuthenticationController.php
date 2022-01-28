<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class UserAuthenticationController extends Controller
{
    function login(){
        return view('auth.login');
    }

    function register(){
        return view('auth.register');
    }

   function save(Request $request){
      // return $request->input();
      $request->validate([
          'name'=>'required',
          'email'=>'required|email|unique:admins',
          'password'=>'required|min:5|max:12'
      ]);
   }

}
