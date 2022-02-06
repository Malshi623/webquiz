<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;



class UserAuthenticationController extends Controller
{
    function login(){
        return view('auth.login');
    }


    function register(){
        return view('auth.register');
    }

//register
   function save(Request $request){
      // return $request->input();
      $request->validate([
          'name'=>'required',
          'email'=>'required|email|unique:admins',
          'password'=>'required|min:5|max:12'
      ]);

      $admin = new Admin;
      $admin->name = $request->name;
      $admin->email = $request->email;
      $admin->password = Hash::make($request->password);
      $save = $admin->save();

      if($save){
          return back()->with('success', 'You have been registered successfuly');
      }else{
          return back()->with('fail', 'Something went wrong. Try again later ');
      }
   }

//login
    function check(Request $request){
        //return $request->input();
        $request->validate([
          'email'=>'required|email',
          'password'=>'required|min:5|max:12'
      ]);

      $userInfo = Admin::where('email','=',$request->email)->first();

      if(!$userInfo){
          return back()->with('fail','We do not recognize your email address');
      }else{
          //check password
          if(Hash::check($request->password, $userInfo->password)){
              $request->session()->put('LoggedUser',$userInfo->id);
              return redirect('admin/userdashboard');
          }else{
              return back()->with('fail','Incorrect password');
          }
      }
    }
    
    //userdashboard
    function userdashboard(){
        return view('admin.userdashboard');
    }
}
