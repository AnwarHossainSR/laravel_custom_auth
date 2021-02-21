<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\MainController;

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

Route::get('auth/login', [MainController::class,'login'])->name('auth.login');
Route::get('auth/register', [MainController::class,'register'])->name('auth.register');
Route::post('auth/save', [MainController::class,'save'])->name('auth.save');
Route::post('auth/login', [MainController::class,'credientials'])->name('auth.login');
Route::get('auth/logout', [MainController::class,'logout'])->name('auth.logout');

Route::middleware(['AuthCheck'])->group(function () {
    Route::get('user/dashboard', [MainController::class,'dashboard'])->name('user.dashboard');
});
