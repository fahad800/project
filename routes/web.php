<?php

use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::controller(userController::class)->group(function(){ 
    Route::get('/login','login')->name('login');
    Route::get('/register','register')->name('register');
    Route::post('/registering','registering')->name('registering');
    Route::post('/log','log')->name('log');
    Route::middleware('userMiddle')->group(function(){
        Route::get('/','home')->name('home');
        Route::get('/logout','logout')->name('logout');

    });
});
