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

    /*game levels-biology*/
    //balloon shoot
    Route::get('/admin/balloonshoot/balloonshoot_biology_levels/balloonshoot_biology_level1',[UserAuthenticationController::class, 'balloonshoot_biology_level1']);
    //dart game
    Route::get('/admin/dartgame/dartgame_biology_levels/dartgame_biology_level1',[UserAuthenticationController::class, 'dartgame_biology_level1']);
    //mountain climb
    Route::get('/admin/mountainclimb/mountainclimb_biology_levels/mountainclimb_biology_level1',[UserAuthenticationController::class, 'mountainclimb_biology_level1']);
    //spin wheel
    Route::get('/admin/spinwheel/spinwheel_biology_levels/spinwheel_biology_level1',[UserAuthenticationController::class, 'spinwheel_biology_level1']);
    
    /*game levels-math*/
    //balloon shoot
    Route::get('/admin/balloonshoot/balloonshoot_math_levels/balloonshoot_math_level1',[UserAuthenticationController::class, 'balloonshoot_math_level1']);
    //dart game
    Route::get('/admin/dartgame/dartgame_math_levels/dartgame_math_level1',[UserAuthenticationController::class, 'dartgame_math_level1']);
    //mountain climb
    Route::get('/admin/mountainclimb/mountainclimb_math_levels/mountainclimb_math_level1',[UserAuthenticationController::class, 'mountainclimb_math_level1']);
    //spin wheel
    Route::get('/admin/spinwheel/spinwheel_math_levels/spinwheel_math_level1',[UserAuthenticationController::class, 'spinwheel_math_level1']);
    
    /*game levels-history*/
    //balloon shoot
    Route::get('/admin/balloonshoot/balloonshoot_history_levels/balloonshoot_history_level1',[UserAuthenticationController::class, 'balloonshoot_history_level1']);
    //dart game
    Route::get('/admin/dartgame/dartgame_history_levels/dartgame_history_level1',[UserAuthenticationController::class, 'dartgame_history_level1']);
    //mountain climb
    Route::get('/admin/mountainclimb/mountainclimb_history_levels/mountainclimb_history_level1',[UserAuthenticationController::class, 'mountainclimb_history_level1']);
    //spin wheel
    Route::get('/admin/spinwheel/spinwheel_history_levels/spinwheel_history_level1',[UserAuthenticationController::class, 'spinwheel_history_level1']);
    
    /*game levels-nature*/
    //balloon shoot
    Route::get('/admin/balloonshoot/balloonshoot_nature_levels/balloonshoot_nature_level1',[UserAuthenticationController::class, 'balloonshoot_nature_level1']);
    //dart game
    Route::get('/admin/dartgame/dartgame_nature_levels/dartgame_nature_level1',[UserAuthenticationController::class, 'dartgame_nature_level1']);
    //mountain climb
    Route::get('/admin/mountainclimb/mountainclimb_nature_levels/mountainclimb_nature_level1',[UserAuthenticationController::class, 'mountainclimb_nature_level1']);
    //spin wheel
    Route::get('/admin/spinwheel/spinwheel_nature_levels/spinwheel_nature_level1',[UserAuthenticationController::class, 'spinwheel_nature_level1']);

    /*game levels-ict*/
    //balloon shoot
    Route::get('/admin/balloonshoot/balloonshoot_ict_levels/balloonshoot_ict_level1',[UserAuthenticationController::class, 'balloonshoot_ict_level1']);
    //dart game
    Route::get('/admin/dartgame/dartgame_ict_levels/dartgame_ict_level1',[UserAuthenticationController::class, 'dartgame_ict_level1']);
    //mountain climb
    Route::get('/admin/mountainclimb/mountainclimb_ict_levels/mountainclimb_ict_level1',[UserAuthenticationController::class, 'mountainclimb_ict_level1']);
    //spin wheel
    Route::get('/admin/spinwheel/spinwheel_ict_levels/spinwheel_ict_level1',[UserAuthenticationController::class, 'spinwheel_ict_level1']);

    /*game levels-random*/
    //balloon shoot
    Route::get('/admin/balloonshoot/balloonshoot_random_levels/balloonshoot_random_level1',[UserAuthenticationController::class, 'balloonshoot_random_level1']);
    //dart game
    Route::get('/admin/dartgame/dartgame_random_levels/dartgame_random_level1',[UserAuthenticationController::class, 'dartgame_random_level1']);
    //mountain climb
    Route::get('/admin/mountainclimb/mountainclimb_random_levels/mountainclimb_random_level1',[UserAuthenticationController::class, 'mountainclimb_random_level1']);
    //spin wheel
    Route::get('/admin/spinwheel/spinwheel_random_levels/spinwheel_random_level1',[UserAuthenticationController::class, 'spinwheel_random_level1']);
});




