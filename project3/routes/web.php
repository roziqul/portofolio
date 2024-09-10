<?php

use App\Http\Controllers\administratorController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\loginController;

use App\Http\Controllers\catalogController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\reservationController;
use App\Http\Controllers\reservedController;
use App\Http\Controllers\sectionController;
use App\Http\Controllers\serialController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\utilityController;

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

Route::get('/admin-assets/{path}', function ($path) {
    return response()->file(base_path('../node_modules/' . $path));
});

Route::get('', function () {
    return redirect()->route('login');
});

Route::get('login', [loginController::class, 'show'])->name('login');
Route::post('login', [loginController::class, 'login'])->name('login');
Route::get('logout', [loginController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'student'], function(){

    Route::get('dashboard', [dashboardController::class, 'index'])->name('student-dashboard');

    Route::resource('catalog', catalogController::class)->only(['index', 'show']);

    Route::resource('category', categoryController::class)->only(['index', 'show']);
    
    Route::resource('section', sectionController::class)->only(['index', 'show']);

    Route::group(['prefix' => 'reservation'], function(){
        Route::get('', [reservationController::class, 'indexbyUser'])->name('student-reservation-index');
        Route::post('', [reservationController::class, 'store'])->name('student-store-reservation');
    });

});

Route::group(['prefix' => 'administrator'], function(){

    Route::get('dashboard', [dashboardController::class, 'index'])->name('admin-dashboard');

    Route::resource('catalog', catalogController::class);

    Route::resource('category', categoryController::class);

    Route::resource('section', sectionController::class);

    Route::post('serial', [serialController::class, 'index'])->name('serial.index');

    Route::group(['prefix' => 'reservation'], function(){
        Route::get('index', [reservationController::class, 'index'])->name('admin-reservation-index');
        Route::post('show', [reservationController::class, 'show'])->name('admin-reservation-show');
        Route::post('detail', [reservationController::class, 'detailCatalog'])->name('admin-reservation-detail');
        Route::post('update', [reservationController::class, 'updateReservation'])->name('admin-reservation-update');
    });

    Route::group(['prefix' => 'reserved'], function(){
        Route::get('search-student', [reservedController::class, 'inputNisn'])->name('admin-reserved-search-student');
        Route::get('student-detail', [reservedController::class, 'outputNisn'])->name('admin-reserved-student-detail');
        Route::get('search-reserved', [reservedController::class, 'searchReserved'])->name('admin-reserved-search-reserved');
        Route::post('result-student', [reservedController::class, 'searchNisn'])->name('admin-reserved-result-student');
        Route::post('result-catalog', [reservedController::class, 'searchCatalog'])->name('admin-reserved-result-catalog');
        Route::post('cancel', [reservedController::class, 'cancelReserved'])->name('admin-reserved-cancel');
        Route::post('submit', [reservedController::class, 'submitReserved'])->name('admin-reserved-submit');
        Route::post('result-reserved', [reservedController::class, 'resultReserved'])->name('admin-reserved-result');
    });

    Route::group(['prefix' => 'missing'], function(){
        Route::get('index', [utilityController::class, 'indexMissingBook'])->name('missing.index');
        Route::post('show', [utilityController::class, 'viewMissingBook'])->name('missing.show');
        Route::post('verify', [utilityController::class, 'verifyMissingBook'])->name('missing.verify');
    });

    Route::resource('student', studentController::class);

    Route::post('student-account-activation', [utilityController::class, 'studentAccountActivation'])->name('student-activation');
    Route::post('student-account-deactivation', [utilityController::class, 'studentAccountDeactivation'])->name('student-deactivation');
    Route::post('administrator-account-activation', [utilityController::class, 'administratorAccountActivation'])->name('admin-activation');
    Route::post('administrator-account-deactivation', [utilityController::class, 'administratorAccountDeactivation'])->name('admin-deactivation');

    Route::resource('administrator-data', administratorController::class);

    // Route::group(['prefix' => 'utilities'], function(){
    //     Route::resource('student', studentController::class);
    //     Route::resource('account', accountController::class);
    //     Route::resource('aset', utilitiesController::class);
    //     Route::resource('administrator', administratorController::class);
    // });

});

