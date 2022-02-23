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

Route::get('/home' , function(){ return view('app.home');});

Route::get('/start' , function(){ return view('app.flight_data');});

Route::get('/test' , function(){ return view('backup.protfolio');});

Route::get('/seconde' , function(){ return view('app.traveler_data');});

Route::get('/third' , function(){ return view('app.appointment_payment'); });

Route::get('/bank-transfer' , function(){ return view('app.bank_transfer'); });

Route::get('/confirm-request' , function(){ return view('app.confirmed_request'); });



// User routes
Route::get('/login' , function(){ return view('app.user.login'); });
Route::get('/profile' , function(){ return view('app.user.profile'); });
Route::get('/request-detail' , function(){ return view('app.user.request_detail'); });



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';
