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

use App\Http\Controllers\NurseDashboard;
use App\Http\Controllers\CalenderController;
use App\Models\User;
use App\Models\Patient;
//use App\Models\Admin;
use App\Models\Nurse;
use App\Models\Nurse_User;
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
Route::group(['middleware' => ['auth:web']], function (){
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
//------------------------------------------------------------------------------------------------
Route::get('/nurselogin', [NurseController::class, 'nlogin'])->name('nurselogin');
Route::post('/nurselogin', [NurseController::class, 'nloginpost'])->name('nurselogin.post');
Route::get('/nurselogout', [NurseController::class, 'nlogout'])->name('nurselogout');
Route::group(['middleware' => ['auth:nurse']], function (){
    Route::get('/nursedashboard', [NurseDashboard::class, 'nurse_dash'])->name('nursedash');
    Route::get('/nurse_schedule', [NurseDashboard::class, 'nurse_schedule'])->name('routine');
    Route::get('/nurse_prev_client', [NurseDashboard::class, 'nurse_prev'])->name('past');
    Route::get('/nurse_now_client', [NurseDashboard::class, 'nurse_now'])->name('current');
    Route::get('/nurse_balance', [NurseDashboard::class, 'nurse_balance'])->name('nurse_balance');
    //Route::get('/add_event', [NurseDashboard::class, 'event'])->name('add_event');
});

//============================================================================================
Route::get('/ratings-and-reviews', [NurseReview::class, 'index'])->name('ratings-and-reviews');
Route::post('/', [SearchController::class, 'search'])->name('search');
Route::get('/search/{data}',[SearchController::class, 'searchList'])->name('search.results');

