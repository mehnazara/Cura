<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\Home;
use App\Http\Controllers\PatientDashboard;
use App\Http\Controllers\Password;
use App\Http\Controllers\GoogleLogin;
use App\Http\Controllers\Service;
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
    Route::post('/patientprofile', [PatientDashboard::class,'updateProfile'])->name('profile.update');
    Route::get('/patientimageupdate', [PatientDashboard::class, 'imageChange'])->name('patient.image');
    Route::post('/patientimageupdate', [PatientDashboard::class, 'patientUpdateImage'])->name('patientimagechange');
    Route::get('/patientreportupdate', [PatientDashboard::class, 'reportChange'])->name('patient.report');
    Route::post('/patientreportupdate', [PatientDashboard::class, 'patientUpdateReport'])->name('patientreportchange');

});

Route::get('/forgot-password', [Password::class, 'forgotpassword'])->name('password.forgot');
Route::post('/forgot-password', [Password::class, 'forgotpasswordpost'])->name('password.forgot.post');
Route::get('/reset-password/{token}', [Password::class, 'resetpassword'])->name('password.reset');
Route::post('/reset-password', [Password::class, 'resetpasswordpost'])->name('password.reset.post');
Route::get('/auth-google', [GoogleLogin::class, 'googlelogin'])->name('login.google');
Route::any('/auth/google/home', [GoogleLogin::class, 'callbackfromGoogle'])->name('google.callback');
Route::get('/services-types', [Service::class, 'serviceList'])->name('service');


Route::get('/nurses/{id}', 'NurseController@show')->name('nurses.show');
Route::post('/nurses/{id}/review', 'NurseController@storeReview')->name('nurses.storeReview');
