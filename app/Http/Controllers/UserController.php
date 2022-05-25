<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(){
        return view('dashboards.users.index');
    }

    function start(){
        return view('dashboards.users.start');
    }

    //games
    function spinwheel(){
        return view('dashboards.users.spinwheel');
    }
    function dartgame(){
        return view('dashboards.users.dartgame');
    }
    function balloonshoot(){
        return view('dashboards.users.balloonshoot');
    }
    function mountainclimb(){
        return view('dashboards.users.mountainclimb');
    }

    //spinwheel
    function spinwheel_math(){
        return view('dashboards.users.spinwheel.math');
    }
    function spinwheel_biology(){
        return view('dashboards.users.spinwheel.biology');
    }
    function spinwheel_nature(){
        return view('dashboards.users.spinwheel.nature');
    }
    function spinwheel_history(){
        return view('dashboards.users.spinwheel.history');
    }
    function spinwheel_technology(){
        return view('dashboards.users.spinwheel.technology');
    }
    function spinwheel_random(){
        return view('dashboards.users.spinwheel.random');
    }

    //dartgame
    function dartgame_math(){
        return view('dashboards.users.dartgame.math');
    }
    function dartgame_biology(){
        return view('dashboards.users.dartgame.biology');
    }
    function dartgame_nature(){
        return view('dashboards.users.dartgame.nature');
    }
    function dartgame_history(){
        return view('dashboards.users.dartgame.history');
    }
    function dartgame_technology(){
        return view('dashboards.users.dartgame.technology');
    }
    function dartgame_random(){
        return view('dashboards.users.dartgame.random');
    }

    //balloonshoot
    function balloonshoot_math(){
        return view('dashboards.users.balloonshoot.math');
    }
    function balloonshoot_biology(){
        return view('dashboards.users.balloonshoot.biology');
    }
    function balloonshoot_nature(){
        return view('dashboards.users.balloonshoot.nature');
    }
    function balloonshoot_history(){
        return view('dashboards.users.balloonshoot.history');
    }
    function balloonshoot_technology(){
        return view('dashboards.users.balloonshoot.technology');
    }
    function balloonshoot_random(){
        return view('dashboards.users.balloonshoot.random');
    }

    //mountainclimb
    function mountainclimb_math(){
        return view('dashboards.users.mountainclimb.math');
    }
    function mountainclimb_biology(){
        return view('dashboards.users.mountainclimb.biology');
    }
    function mountainclimb_nature(){
        return view('dashboards.users.mountainclimb.nature');
    }
    function mountainclimb_history(){
        return view('dashboards.users.mountainclimb.history');
    }
    function mountainclimb_technology(){
        return view('dashboards.users.mountainclimb.technology');
    }
    function mountainclimb_random(){
        return view('dashboards.users.mountainclimb.random');
    }

    
}

