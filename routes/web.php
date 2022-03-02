<?php

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\PaymentsController;
use App\Http\Controllers\Client\ShowPageController;
use App\Http\Controllers\Client\TravelerController;
use App\Http\Controllers\Client\UserController;
use App\Http\Controllers\Client\VisaRequestController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () { return view('welcome');});



Route::get('/home' , [HomeController::class , 'home'])->name('client.home');
Route::get('/step-1' , [VisaRequestController::class , 'requestForm'])->name('client.step_one');
Route::get('/step-2' , [TravelerController::class , 'travelerForm'])->name('client.step_two');
Route::get('/step-3' , [VisaRequestController::class , 'appointmentForm'])->name('client.step_three');
Route::get('/bank-transfer' , [PaymentsController::class , 'bank'])->name('client.bank');
Route::get('/confirm-request' , [VisaRequestController::class , 'requestSent'])->name('client.request_sent');

Route::get('/request-detail' , [VisaRequestController::class , 'showRequest'])->name('client.request.show');

// User routes
Route::get('/login' , [UserController::class , 'login'])->name('user.login');
Route::get('/profile' , [UserController::class , 'profile'])->name('user.profile');


// Route::get('/home' , function(){ return view('app.home');})->name('home');
// Route::get('/step-1' , function(){ return view('app.flight_data');})->name('step-1');

// Route::get('/step-2' , function(){ return view('app.traveler_data');})->name('step-2');
// Route::get('/step-3' , function(){ return view('app.appointment_payment'); })->name('step-3');
// Route::get('/bank-transfer' , function(){ return view('app.bank_transfer'); })->name('bank_transfer');
// Route::get('/confirm-request' , function(){ return view('app.confirmed_request'); })->name('confirm_request');
// Route::get('/test' , function(){ return view('backup.protfolio');});



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';
