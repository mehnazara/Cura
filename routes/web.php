<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\Home;
use App\Http\Controllers\PatientDashboard;
use App\Http\Controllers\Password;
use App\Http\Controllers\GoogleLogin;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\NurseReview;
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
    Route::get('/booked_nurses/{nurse_id}', [NurseController::class, 'bookNurse'])->name('bookedNurses');
});

Route::get('/forgot-password', [Password::class, 'forgotpassword'])->name('password.forgot');
Route::post('/forgot-password', [Password::class, 'forgotpasswordpost'])->name('password.forgot.post');
Route::get('/reset-password/{token}', [Password::class, 'resetpassword'])->name('password.reset');
Route::post('/reset-password', [Password::class, 'resetpasswordpost'])->name('password.reset.post');
Route::get('/auth-google', [GoogleLogin::class, 'googlelogin'])->name('login.google');
Route::any('/auth/google/home', [GoogleLogin::class, 'callbackfromGoogle'])->name('google.callback');
Route::get('/services-types', [ServiceController::class, 'serviceList'])->name('service');
Route::get('/services-types/{id}', [ServiceController::class, 'showAssignedNurses']);


Route::get('/nurseProfiles', [NurseController::class, 'profiles'])->name('nurse.profiles');




//Route::get('/ratings-and-reviews', [NurseReview::class, 'index'])->name('ratings-and-reviews');
Route::post('/', [SearchController::class, 'search'])->name('search');
Route::get('/search/{data}',[SearchController::class, 'searchList'])->name('search.results');
Route::get('/nurseReviews/{nurse_id}', [NurseReview::class, 'showReview'])->name('nurse.reviews');

