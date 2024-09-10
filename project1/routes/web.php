<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AlumniGraduateController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BuletinController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HeadmasterController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthController::class, 'login'])->name('login');
// Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('dashboard', [PublicController::class, 'index'])->name('public.dashboard');

Route::get('sambutan-kepala-sekolah', [PublicController::class, 'getHeadmaster'])->name('public.headmaster');
Route::get('ekstrakulikuler', [PublicController::class, 'getExtras'])->name('public.headmaster');

Route::get('news', [PublicController::class, 'getNews'])->name('public.news');

Route::get('news/{id}', [PublicController::class, 'showNews'])->name('public.news.detail');

Route::group(['prefix' => 'administrator'], function(){

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('alumni-graduate', AlumniGraduateController::class);

    Route::resource('buletin', BuletinController::class);

    Route::resource('gallery', GalleryController::class);
    
    Route::resource('position', PositionController::class);

    Route::resource('headmaster', HeadmasterController::class);

    Route::resource('achievement', AchievementController::class);

    Route::resource('teacher', TeacherController::class);

    Route::resource('slider', SliderController::class);

    //utilitas
});