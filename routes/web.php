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


    Route::get('/auth/login',[UserAuthenticationController::class, 'login'])->name('auth.login');
    Route::get('/auth/register',[UserAuthenticationController::class, 'register'])->name('auth.register');
