<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HalamanUserController;
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

// yang boleh akses hanya untuk yang belom pernah login
Route::middleware(['guest'])->group(function(){
	
    Route::get('/',[UserController::class, 'index'])->name('login');
    Route::post('/login',[UserController::class, 'login'])->name('login');
});

Route::middleware(['auth'])->group(function(){

	Route::get('/logout',[UserController::class, 'logout'])->name('logout');

	Route::get('/admin/index',[AdminController::class, 'index'])->name('admin')->middleware('HakAkses:admin');

	Route::get('/admin/user',[HalamanUserController::class, 'index'])->name('user')->middleware('HakAkses:user');
});