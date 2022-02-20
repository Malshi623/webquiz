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
        return view('admin.spinwheel.spinwheel',$data);

    }

    //balloon shoot
    function balloonshoot(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.balloonshoot.balloonshoot',$data);

    }

    //dar tgame
    function dartgame(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.dartgame.dartgame',$data);

    }

    //mountain climb
    function mountainclimb(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.mountainclimb.mountainclimb',$data);

    }
    
    //spin wheel levels
    function spinwheel_math(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.spinwheel.spinwheel_levels.spinwheel_math',$data);

    }
    function spinwheel_biology(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.spinwheel.spinwheel_levels.spinwheel_biology',$data);

    }
    function spinwheel_nature(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.spinwheel.spinwheel_levels.spinwheel_nature',$data);

    }
    function spinwheel_history(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.spinwheel.spinwheel_levels.spinwheel_history',$data);

    }
    function spinwheel_ict(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.spinwheel.spinwheel_levels.spinwheel_ict',$data);

    }
    function spinwheel_random(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.spinwheel.spinwheel_levels.spinwheel_random',$data);

    }

    //dart game levels
    function dartgame_math(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.dartgame.dartgame_levels.dartgame_math',$data);

    }
    function dartgame_biology(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.dartgame.dartgame_levels.dartgame_biology',$data);

    }
    function dartgame_nature(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.dartgame.dartgame_levels.dartgame_nature',$data);

    }
    function dartgame_history(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.dartgame.dartgame_levels.dartgame_history',$data);

    }
    function dartgame_ict(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.dartgame.dartgame_levels.dartgame_ict',$data);

    }
    function dartgame_random(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.dartgame.dartgame_levels.dartgame_random',$data);

    }

    //balloon shoot levels
    function balloonshoot_math(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.balloonshoot.balloonshoot_levels.balloonshoot_math',$data);

    }
    function balloonshoot_biology(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.balloonshoot.balloonshoot_levels.balloonshoot_biology',$data);

    }
    function balloonshoot_nature(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.balloonshoot_balloonshoot.levels.balloonshoot_nature',$data);

    }
    function balloonshoot_history(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.balloonshoot.balloonshoot_levels.balloonshoot_history',$data);

    }
    function balloonshoot_ict(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.balloonshoot.balloonshoot_levels.balloonshoot_ict',$data);

    }
    function balloonshoot_random(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.balloonshoot.balloonshoot_levels.balloonshoot_random',$data);

    }

    //mountain climb levels
    function mountainclimb_math(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.mountainclimb.mountainclimb_levels.mountainclimb_math',$data);

    }
    function mountainclimb_biology(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.mountainclimb.mountainclimb_levels.mountainclimb_biology',$data);

    }
    function mountainclimb_nature(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.mountainclimb.levels.nature',$data);

    }
    function mountainclimb_history(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.mountainclimb.mountainclimb_levels.mountainclimb_history',$data);

    }
    function mountainclimb_ict(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.mountainclimb.mountainclimb_levels.mountainclimb_ict',$data);

    }
    function mountainclimb_random(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.mountainclimb.mountainclimb_levels.mountainclimb_random',$data);

    }
}
