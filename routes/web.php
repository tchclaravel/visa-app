<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\City\AdminCityController;
use App\Http\Controllers\Admin\Country\AdminCountryController;
use App\Http\Controllers\Admin\Page\AdminPageController;
use App\Http\Controllers\Admin\Setting\AdminAppointmentController;
use App\Http\Controllers\Admin\Setting\AdminBankController;
use App\Http\Controllers\Admin\Setting\AdminSettingController;
use App\Http\Controllers\Admin\User\AdminUserController;
use App\Http\Controllers\Admin\Visa\AdminVisaController;
use App\Http\Controllers\Admin\VisaRequest\AdminGeneratePdf;
use App\Http\Controllers\Admin\VisaRequest\AdminVisaRequestController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\PaymentsController;
use App\Http\Controllers\Client\ShowPageController;
use App\Http\Controllers\Client\TravelerController;
use App\Http\Controllers\Client\UserController;
use App\Http\Controllers\Client\VisaRequestController;
use App\Http\Controllers\PageController;
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

// Route::get('/', function () { return view('welcome');});

/* ================= [Client Routes] =================  */ 

// SEO Pages
Route::get('/privacy_policy' , [PageController::class , 'privacyPolicy'])->name('client.privacy_policy');
Route::get('/terms_of_use' , [PageController::class , 'termsOfUse'])->name('client.terms_of_use');


Route::get('/' , [HomeController::class , 'home'])->name('client.home');
// Route::post('/step-1' , [VisaRequestForm::class , 'storeRequest'])->name('client.step_one.store');

// Step [1] && Step [2] && Step [3]
Route::get('/step-1' , [VisaRequestController::class , 'requestForm'])->name('client.step_one');
Route::get('/step-2' , [TravelerController::class , 'travelerForm'])->name('client.step_two');
Route::get('/step-3' , [VisaRequestController::class , 'appointmentForm'])->name('client.step_three');
Route::get('/confirm-request' , [VisaRequestController::class , 'requestSent'])->name('client.request_sent');

// Payment methods routes
Route::get('/bank-transfer' , [PaymentsController::class , 'bank'])->name('client.bank');
Route::get('/e-payment' , [PaymentsController::class , 'ePayment'])->name('client.e-payment');


// Contact Routes
// Route::post('/contact' , [ContactController::class , 'sendMessage'])->name('client.contact');
Route::post('/contact' , [ContactController::class , 'sendMessage'])->name('client.contact');

Route::get('/test1' , function(){
    return view('client.email.contact');
});


// User routes
Route::get('/login' , [UserController::class , 'loginForm'])->name('user.login');
Route::post('/login' , [UserController::class , 'login'])->name('user.login.post');
Route::get('/logout' , [UserController::class , 'logout'])->name('user.logout');
Route::get('/profile' , [UserController::class , 'profile'])->name('user.profile');
Route::get('/request-detail/{id}' , [VisaRequestController::class , 'showRequest'])->name('client.request.show');





/* ================= [Admin Routes] =================  */ 
Route::prefix('admin')->group(function(){

    // General Routes
    Route::middleware('guest:admin')->group(function(){
        Route::get('/login' , [AdminAuthController::class , 'loginForm'])->name('admin.login')->middleware('guest');
        Route::post('/login' , [AdminAuthController::class , 'login'])->name('admin.login.post');
    });

    // Protected Routes
    Route::middleware('admin')->group(function(){
        // Admin Routes
        Route::get('/index' , [AdminHomeController::class , 'index'])->name('admin.index');
        Route::get('/logout' , [AdminAuthController::class , 'logout'])->name('admin.logout');

        // Country Routes
        Route::get('/countries' , [AdminCountryController::class , 'index'])->name('admin.countries');
        Route::post('/country/store' , [AdminCountryController::class , 'store'])->name('admin.countries.store');
        Route::post('/country/delete/{id}' , [AdminCountryController::class , 'delete'])->name('admin.countries.delete');
        Route::get('/countries/search' , [AdminCountryController::class , 'search'])->name('admin.countries.search');

        // City Routes
        Route::get('/cities' , [AdminCityController::class , 'index'])->name('admin.cities');
        Route::post('/city/store' , [AdminCityController::class , 'store'])->name('admin.cities.store');
        Route::post('/city/delete/{id}' , [AdminCityController::class , 'delete'])->name('admin.cities.delete');
        Route::get('/cities/search' , [AdminCityController::class , 'search'])->name('admin.cities.search');

        // Visa Routes
        Route::get('/visas' , [AdminVisaController::class , 'index'])->name('admin.visas');
        Route::post('/visa/store' , [AdminVisaController::class , 'store'])->name('admin.visas.store');
        Route::post('/visa/delete/{id}' , [AdminVisaController::class , 'delete'])->name('admin.visas.delete');
        

        // User Routes
        Route::get('/users' , [AdminUserController::class , 'index'])->name('admin.users');
        Route::post('/user/delete/{id}' , [AdminUserController::class , 'delete'])->name('admin.users.delete');
        Route::get('/users/search' , [AdminUserController::class , 'search'])->name('admin.users.search');

        // Setting Routes
        Route::get('/settings' , [AdminSettingController::class , 'index'])->name('admin.settings');
        // Setting [Appointment]
        Route::post('/appointment/store' , [AdminAppointmentController::class , 'store'])->name('admin.appointments.store');
        Route::post('/appointment/delete/{id}' , [AdminAppointmentController::class , 'delete'])->name('admin.appointments.delete');
        // Setting [Banks]
        Route::post('/bank/store' , [AdminBankController::class , 'store'])->name('admin.banks.store');
        Route::post('/bank/delete/{id}' , [AdminBankController::class , 'delete'])->name('admin.banks.delete');
        // Setting [Pages]
        Route::get('/update/{page_title}' , [AdminPageController::class , 'edit'])->name('admin.pages.edit');
        Route::post('/update/{page_title}/' , [AdminPageController::class , 'update'])->name('admin.pages.update');


        // Visa Requests Routes
        Route::get('/visa-requests' , [AdminVisaRequestController::class , 'index'])->name('admin.requests');
        Route::get('/visa-requests/{id}' , [AdminVisaRequestController::class , 'showDetail'])->name('admin.requests.show');

        // Visa Requests - Generate Pdf
        Route::get('/insurance/generate-pdf/{request_number}' , [AdminGeneratePdf::class , 'insurance'])->name('admin.generate.insurance');
        Route::get('/booking/generate-pdf/{request_number}' , [AdminGeneratePdf::class , 'booking'])->name('admin.generate.booking');
        Route::get('/ticket/generate-pdf/{request_number}' , [AdminGeneratePdf::class , 'ticket'])->name('admin.generate.ticket');

    });
    
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';
