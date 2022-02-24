<?php

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

Route::get('/home' , function(){ return view('app.home');})->name('home');
Route::get('/step-1' , function(){ return view('app.flight_data');})->name('step-1');

Route::get('/step-2' , function(){ return view('app.traveler_data');})->name('step-2');
Route::get('/step-3' , function(){ return view('app.appointment_payment'); })->name('step-3');
Route::get('/bank-transfer' , function(){ return view('app.bank_transfer'); })->name('bank_transfer');
Route::get('/confirm-request' , function(){ return view('app.confirmed_request'); })->name('confirm_request');


// User routes
Route::get('/login' , function(){ return view('app.user.login'); });
Route::get('/profile' , function(){ return view('app.user.profile'); })->name('profile');
Route::get('/request-detail' , function(){ return view('app.user.request_detail'); })->name('request_detail');


Route::get('/test' , function(){ return view('backup.protfolio');});



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';
