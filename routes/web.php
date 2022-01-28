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

Route::get('login',[UserAuthenticationController::class, 'login']);
Route::get('register',[UserAuthenticationController::class, 'register']);
Route::get('create',[UserAuthenticationController::class, 'create'])->name('auth.create');
