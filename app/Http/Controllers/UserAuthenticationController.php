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

      //insert data to database
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

     
      $UserInfo = Admin::where('email','=',$request->email)->first();

      if(!$UserInfo){
          return back()->with('fail','We do not recognize your email address');
      }else{
          //check password
          if(Hash::check($request->password, $UserInfo->password)){
              $request->session()->put('LoggedUser',$UserInfo->id);
              return redirect('admin/dashboard');
          }else{
              return back()->with('fail','Incorrect password');
          }
      }
    }
    
    //logout
    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/auth/login');
        }
    }
  

    //userdashboard
    function dashboard(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.dashboard',$data);

    }

    //start
    function start(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.start',$data);

    }

    //spin wheel
    function spinwheel(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.spinwheel',$data);

    }
    
    
}
