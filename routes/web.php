<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminCityController;
use App\Http\Controllers\Admin\AdminCountryController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminVisaController;
use App\Http\Controllers\Admin\AdminVisaRequestController;


use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\PaymentsController;
use App\Http\Controllers\Client\ShowPageController;
use App\Http\Controllers\Client\TravelerController;
use App\Http\Controllers\Client\UserController;
use App\Http\Controllers\Client\VisaRequestController;
use App\Http\Livewire\VisaRequestForm;
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
// Route::post('/step-1' , [VisaRequestForm::class , 'storeRequest'])->name('client.step_one.store');


Route::get('/step-2' , [TravelerController::class , 'travelerForm'])->name('client.step_two');

Route::get('/step-3' , [VisaRequestController::class , 'appointmentForm'])->name('client.step_three');

// Payment methods routes
Route::get('/bank-transfer' , [PaymentsController::class , 'bank'])->name('client.bank');
Route::get('/e-payment' , [PaymentsController::class , 'ePayment'])->name('client.e-payment');

Route::get('/confirm-request' , [VisaRequestController::class , 'requestSent'])->name('client.request_sent');

// User routes
Route::get('/login' , [UserController::class , 'loginForm'])->name('user.login');
Route::post('/login' , [UserController::class , 'login'])->name('user.login.post');
Route::get('/logout' , [UserController::class , 'logout'])->name('user.logout');
Route::get('/profile' , [UserController::class , 'profile'])->name('user.profile');
Route::get('/request-detail/{id}' , [VisaRequestController::class , 'showRequest'])->name('client.request.show');



// Admin Routes

Route::get('/admin/index' , function(){
    return view('admin.home');
});

Route::prefix('admin')->group(function(){

    Route::get('/index' , [AdminHomeController::class , 'index'])->name('admin.index');

    Route::get('/countries' , [AdminCountryController::class , 'index'])->name('admin.countries');
    Route::post('/countries' , [AdminCountryController::class , 'store'])->name('admin.countries.store');


    Route::get('/visa-requests' , [AdminVisaRequestController::class , 'index'])->name('admin.requests');
    Route::get('/users' , [AdminUserController::class , 'index'])->name('admin.users');
    Route::get('/visas' , [AdminVisaController::class , 'index'])->name('admin.visas');
    Route::get('/cities' , [AdminCityController::class , 'index'])->name('admin.cities');
    Route::get('/settings' , [AdminSettingController::class , 'index'])->name('admin.settings');

});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';
