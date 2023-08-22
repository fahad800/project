<?php

use App\Http\Controllers\adminController;
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

Route::prefix('admin')->controller(adminController::class)->middleware('adminMiddle')->group(function () {
    Route::get('/','home')->name('admin.home');
    Route::get('/add','addprovider')->name('add.user');
    Route::post('/save','usersave')->name('save.user');
    Route::get('/userdelete{id}','userdelete')->name('delete.user');
    Route::get('/edituser{id}','edituser')->name('edit.user');
    Route::post('/saveedit{id}','saveedit')->name('save.edit');
});
