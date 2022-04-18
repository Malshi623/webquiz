<?php

use Illuminate\Support\Facades\Route;
use\App\Http\Controllers\UserAuthenticationController;

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


Route::post('/auth/save',[UserAuthenticationController::class, 'save'])->name('auth.save');
Route::post('/auth/check',[UserAuthenticationController::class, 'check'])->name('auth.check');
Route::get('/auth/logout',[UserAuthenticationController::class, 'logout'])->name('auth.logout');





Route::group(['middleware'=>['AuthCheck']],function(){
    
    //authentication
    Route::get('/auth/login',[UserAuthenticationController::class, 'login'])->name('auth.login');
    Route::get('/auth/register',[UserAuthenticationController::class, 'register'])->name('auth.register');
    

    Route::get('/admin/dashboard',[UserAuthenticationController::class, 'dashboard']);
    Route::get('/admin/start',[UserAuthenticationController::class, 'start']);
    
    //games
    Route::get('/admin/spinwheel/spinwheel',[UserAuthenticationController::class, 'spinwheel']);
    Route::get('/admin/dartgame/dartgame',[UserAuthenticationController::class, 'dartgame']);
    Route::get('/admin/balloonshoot/balloonshoot',[UserAuthenticationController::class, 'balloonshoot']);
    Route::get('/admin/mountainclimb/mountainclimb',[UserAuthenticationController::class, 'mountainclimb']);
    
    //spin wheel levels
    Route::get('/admin/spinwheel/spinwheel_levels/spinwheel_math',[UserAuthenticationController::class, 'spinwheel_math']);
    Route::get('/admin/spinwheel/spinwheel_levels/spinwheel_biology',[UserAuthenticationController::class, 'spinwheel_biology']);
    Route::get('/admin/spinwheel/spinwheel_levels/spinwheel_nature',[UserAuthenticationController::class, 'spinwheel_nature']);
    Route::get('/admin/spinwheel/spinwheel_levels/spinwheel_history',[UserAuthenticationController::class, 'spinwheel_history']);
    Route::get('/admin/spinwheel/spinwheel_levels/spinwheel_ict',[UserAuthenticationController::class, 'spinwheel_ict']);
    Route::get('/admin/spinwheel/spinwheel_levels/spinwheel_random',[UserAuthenticationController::class, 'spinwheel_random']);

    //dart game levels
    Route::get('/admin/dartgame/dartgame_levels/dartgame_math',[UserAuthenticationController::class, 'dartgame_math']);
    Route::get('/admin/dartgame/dartgame_levels/dartgame_biology',[UserAuthenticationController::class, 'dartgame_biology']);
    Route::get('/admin/dartgame/dartgame_levels/dartgame_nature',[UserAuthenticationController::class, 'dartgame_nature']);
    Route::get('/admin/dartgame/dartgame_levels/dartgame_history',[UserAuthenticationController::class, 'dartgame_history']);
    Route::get('/admin/dartgame/dartgame_levels/dartgame_ict',[UserAuthenticationController::class, 'dartgame_ict']);
    Route::get('/admin/dartgame/dartgame_levels/dartgame_random',[UserAuthenticationController::class, 'dartgame_random']);

    //balloon shoot levels
    Route::get('/admin/balloonshoot/balloonshoot_levels/balloonshoot_math',[UserAuthenticationController::class, 'balloonshoot_math']);
    Route::get('/admin/balloonshoot/balloonshoot_levels/balloonshoot_biology',[UserAuthenticationController::class, 'balloonshoot_biology']);
    Route::get('/admin/balloonshoot/balloonshoot_levels/balloonshoot_nature',[UserAuthenticationController::class, 'balloonshoot_nature']);
    Route::get('/admin/balloonshoot/balloonshoot_levels/balloonshoot_history',[UserAuthenticationController::class, 'balloonshoot_history']);
    Route::get('/admin/balloonshoot/balloonshoot_levels/balloonshoot_ict',[UserAuthenticationController::class, 'balloonshoot_ict']);
    Route::get('/admin/balloonshoot/balloonshoot_levels/balloonshoot_random',[UserAuthenticationController::class, 'balloonshoot_random']);

    //mountain climb levels
    Route::get('/admin/mountainclimb/mountainclimb_levels/mountainclimb_math',[UserAuthenticationController::class, 'mountainclimb_math']);
    Route::get('/admin/mountainclimb/mountainclimb_levels/mountainclimb_biology',[UserAuthenticationController::class, 'mountainclimb_biology']);
    Route::get('/admin/mountainclimb/mountainclimb_levels/mountainclimb_nature',[UserAuthenticationController::class, 'mountainclimb_nature']);
    Route::get('/admin/mountainclimb/mountainclimb_levels/mountainclimb_history',[UserAuthenticationController::class, 'mountainclimb_history']);
    Route::get('/admin/mountainclimb/mountainclimb_levels/mountainclimb_ict',[UserAuthenticationController::class, 'mountainclimb_ict']);
    Route::get('/admin/mountainclimb/mountainclimb_levels/mountainclimb_random',[UserAuthenticationController::class, 'mountainclimb_random']);
    
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
