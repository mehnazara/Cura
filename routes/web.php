<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\Home;
use App\Http\Controllers\PatientDashboard;
use App\Http\Controllers\Password;
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

Route::get('/', [Home::class, 'home'])->name('home');

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginpost'])->name('login.post');
Route::get('/register', [AuthManager::class, 'register'])->name('register');
Route::post('/register', [AuthManager::class, 'registerpost'])->name('register.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');
Route::group(['middleware' => 'auth'], function (){
    Route::get('/patientprofile', [PatientDashboard::class, 'profile'])->name('patientprofile');

});

Route::get('/forgot-password', [Password::class, 'forgotpassword'])->name('password.forgot');
Route::post('/forgot-password', [Password::class, 'forgotpasswordpost'])->name('password.forgot.post');
Route::get('/reset-password/{token}', [Password::class, 'resetpassword'])->name('password.reset');
Route::post('/reset-password', [Password::class, 'resetpasswordpost'])->name('password.reset.post');