<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MainDestinationController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubDestinationController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Public\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthController::class, 'loginpage'])->name('login');
Route::post('login', [AuthController::class, 'postLogin'])->name('post.login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('', function () {
    return redirect('/homepage');
});

Route::get('/homepage', [HomeController::class, 'homepage'])->name('homepage');

Route::get('homepage/article', [HomeController::class, 'allArticle'])->name('article.public.index');
Route::get('homepage/article/{id}', [HomeController::class, 'showArticle'])->name('article.public.show');
Route::post('reservation', [HomeController::class, 'postReservation'])->name('reservation.post');

Route::middleware(['auth', 'session.expired'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('article', ArticleController::class);
    Route::resource('contact', ContactController::class)->only(['index', 'edit', 'update']);
    Route::resource('gallery', GalleryController::class)->except(['edit', 'update']);
    Route::resource('maindestination', MainDestinationController::class);
    Route::resource('subdestination', SubDestinationController::class);
    Route::resource('review', ReviewController::class);
    Route::resource('slider', SliderController::class)->except(['edit', 'update']);
});
