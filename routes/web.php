<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function(){
    Auth::routes();
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//routes for admin
Route::group(['prefix'=>'admin','middleware'=>['isAdmin','auth','PreventBackHistory']],function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
});

//routes for user
Route::group(['prefix'=>'user','middleware'=>['isUser','auth','PreventBackHistory']],function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::get('start',[UserController::class,'start'])->name('user.start');

    //routes for games
    Route::get('spinwheel',[UserController::class,'spinwheel'])->name('user.spinwheel');
    Route::get('dartgame',[UserController::class,'spinwheel'])->name('user.dartgame');
    Route::get('balloonshoot',[UserController::class,'spinwheel'])->name('user.balloonshoot');
    Route::get('mountainclimb',[UserController::class,'spinwheel'])->name('user.mountainclimb');

    //spinwheel
    Route::get('spinwheel_math',[UserController::class,'spinwheel_math'])->name('user.spinwheel_math');
    Route::get('spinwheel_biology',[UserController::class,'spinwheel_biology'])->name('user.spinwheel_biology');
    Route::get('spinwheel_nature',[UserController::class,'spinwheel_nature'])->name('user.spinwheel_nature');
    Route::get('spinwheel_history',[UserController::class,'spinwheel_history'])->name('user.spinwheel_history');
    Route::get('spinwheel_technology',[UserController::class,'spinwheel_technology'])->name('user.spinwheel_technology');
    Route::get('spinwheel_random',[UserController::class,'spinwheel_random'])->name('user.spinwheel_random');

    //dartgame
    Route::get('dartgame_math',[UserController::class,'dartgame_math'])->name('user.dartgame_math');
    Route::get('dartgame_biology',[UserController::class,'dartgame_biology'])->name('user.dartgame_biology');
    Route::get('dartgame_nature',[UserController::class,'dartgame_nature'])->name('user.dartgame_nature');
    Route::get('dartgame_history',[UserController::class,'dartgame_history'])->name('user.dartgame_history');
    Route::get('dartgame_technology',[UserController::class,'dartgame_technology'])->name('user.dartgame_technology');
    Route::get('dartgame_random',[UserController::class,'dartgame_random'])->name('user.dartgame_random');

    //balloonshoot
    Route::get('balloonshoot_math',[UserController::class,'balloonshoot_math'])->name('user.balloonshoot_math');
    Route::get('balloonshoot_biology',[UserController::class,'balloonshoot_biology'])->name('user.balloonshoot_biology');
    Route::get('balloonshoot_nature',[UserController::class,'balloonshoot_nature'])->name('user.balloonshoot_nature');
    Route::get('balloonshoot_history',[UserController::class,'balloonshoot_history'])->name('user.balloonshoot_history');
    Route::get('balloonshoot_technology',[UserController::class,'balloonshoot_technology'])->name('user.balloonshoot_technology');
    Route::get('balloonshoot_random',[UserController::class,'balloonshoot_random'])->name('user.balloonshoot_random');

    //mountainclimb
    Route::get('mountainclimb_math',[UserController::class,'mountainclimb_math'])->name('user.mountainclimb_math');
    Route::get('mountainclimb_biology',[UserController::class,'mountainclimb_biology'])->name('user.mountainclimb_biology');
    Route::get('mountainclimb_nature',[UserController::class,'mountainclimb_nature'])->name('user.mountainclimb_nature');
    Route::get('mountainclimb_history',[UserController::class,'mountainclimb_history'])->name('user.mountainclimb_history');
    Route::get('mountainclimb_technology',[UserController::class,'mountainclimb_technology'])->name('user.mountainclimb_technology');
    Route::get('mountainclimb_random',[UserController::class,'mountainclimb_random'])->name('user.mountainclimb_random');

    //math levels
    Route::get('spinwheel_math_level1',[UserController::class,'spinwheel_math_level1'])->name('user.spinwheel_math_level1');
    Route::get('dartgame_math_level1',[UserController::class,'dartgame_math_level1'])->name('user.dartgame_math_level1');
    Route::get('balloonshoot_math_level1',[UserController::class,'balloonshoot_math_level1'])->name('user.balloonshoot_math_level1');
    Route::get('mountainclimb_math_level1',[UserController::class,'mountainclimb_math_level1'])->name('user.mountainclimb_math_level1');

    //biology levels
    Route::get('spinwheel_biology_level1',[UserController::class,'spinwheel_biology_level1'])->name('user.spinwheel_biology_level1');
    Route::get('dartgame_biology_level1',[UserController::class,'dartgame_biology_level1'])->name('user.dartgame_biology_level1');
    Route::get('balloonshoot_biology_level1',[UserController::class,'balloonshoot_biology_level1'])->name('user.balloonshoot_biology_level1');
    Route::get('mountainclimb_biology_level1',[UserController::class,'mountainclimb_biology_level1'])->name('user.mountainclimb_biology_level1');

    //nature levels
    Route::get('spinwheel_nature_level1',[UserController::class,'spinwheel_nature_level1'])->name('user.spinwheel_nature_level1');
    Route::get('dartgame_nature_level1',[UserController::class,'dartgame_nature_level1'])->name('user.dartgame_nature_level1');
    Route::get('balloonshoot_nature_level1',[UserController::class,'balloonshoot_nature_level1'])->name('user.balloonshoot_nature_level1');
    Route::get('mountainclimb_nature_level1',[UserController::class,'mountainclimb_nature_level1'])->name('user.mountainclimb_nature_level1');

    //history levels
    Route::get('spinwheel_history_level1',[UserController::class,'spinwheel_history_level1'])->name('user.spinwheel_history_level1');
    Route::get('dartgame_history_level1',[UserController::class,'dartgame_history_level1'])->name('user.dartgame_history_level1');
    Route::get('balloonshoot_history_level1',[UserController::class,'balloonshoot_history_level1'])->name('user.balloonshoot_history_level1');
    Route::get('mountainclimb_history_level1',[UserController::class,'mountainclimb_history_level1'])->name('user.mountainclimb_history_level1');

    //technology levels
    Route::get('spinwheel_technology_level1',[UserController::class,'spinwheel_technology_level1'])->name('user.spinwheel_technology_level1');
    Route::get('dartgame_technology_level1',[UserController::class,'dartgame_technology_level1'])->name('user.dartgame_technology_level1');
    Route::get('balloonshoot_technology_level1',[UserController::class,'balloonshoot_technology_level1'])->name('user.balloonshoot_technology_level1');
    Route::get('mountainclimb_technology_level1',[UserController::class,'mountainclimb_technology_level1'])->name('user.mountainclimb_technology_level1');

    //random levels
    Route::get('spinwheel_random_level1',[UserController::class,'spinwheel_random_level1'])->name('user.spinwheel_random_level1');
    Route::get('dartgame_random_level1',[UserController::class,'dartgame_random_level1'])->name('user.dartgame_random_level1');
    Route::get('balloonshoot_random_level1',[UserController::class,'balloonshoot_random_level1'])->name('user.balloonshoot_random_level1');
    Route::get('mountainclimb_random_level1',[UserController::class,'mountainclimb_random_level1'])->name('user.mountainclimb_random_level1');
});