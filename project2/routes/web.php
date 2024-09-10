<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\PaymentController as AdminPayment;
use App\Http\Controllers\Admin\PendataanController as AdminPendataan;
use App\Http\Controllers\Admin\SeleksiController as AdminSeleksi;
use App\Http\Controllers\Admin\Utilities\FeatureController;
use App\Http\Controllers\Admin\Utilities\QuotaController;
use App\Http\Controllers\Admin\Utilities\SiswaController;
use App\Http\Controllers\Admin\Utilities\UserController;
use App\Http\Controllers\Public\DashboardController as PublicDashboard;
use App\Http\Controllers\Public\Pendataan\VerifikasiController as PendataanVerifikasi;
use App\Http\Controllers\Public\Pendataan\BiodataController as PendataanBiodata;
use App\Http\Controllers\Public\Pendataan\OrtuController as PendataanOrtu;
use App\Http\Controllers\Public\Pendataan\ArchieveController as PendataanPemberkasan;
use App\Http\Controllers\Public\Pendataan\PaymentController as PendataanPayment;
use App\Http\Controllers\Public\Pendataan\FinalisasiController as PendataanFinalisasi;
use App\Http\Controllers\Public\Pendataan\StatusController as PendataanStatus;

use App\Http\Controllers\Public\Seleksi\SeleksiController as SeleksiController;
use App\Http\Controllers\Public\Seleksi\FinalisasiController as SeleksiFinalisasi;
use App\Http\Controllers\Public\Seleksi\StatusController as SeleksiStatus;
use App\Http\Controllers\Public\Seleksi\PaymentController as SeleksiPayment;

use Illuminate\Support\Facades\Route;

Route::get('', function () {
    return redirect()->route('getLogin');
});

Route::get('/login', [LoginController::class,'show'])->name('getLogin');
Route::get('/register', [RegisterController::class,'show'])->name('getRegister');
Route::get('/logout', [LogoutController::class,'logout'])->name('getLogout');
Route::post('/login', [LoginController::class,'login'])->name('postLogin');
Route::post('/register',[RegisterController::class,'register'])->name('postRegister');

Route::group(['prefix' => 'siswa'], function(){

    Route::get('dashboard', [PublicDashboard::class,'dashboard'])->name('public.dashboard');

    Route::group(['prefix' => 'pendataan'], function(){
        Route::get('verifikasi-data', [PendataanVerifikasi::class,'create'])->name('get.pendataan.verifikasi');
        Route::get('biodata-siswa', [PendataanBiodata::class,'create'])->name('get.pendataan.biodata');
        Route::get('data-orang-tua', [PendataanOrtu::class,'create'])->name('get.pendataan.ortu');
        Route::get('pemberkasan', [PendataanPemberkasan::class,'create'])->name('get.pendataan.pemberkasan');
        Route::get('pembayaran-registrasi', [PendataanPayment::class,'create'])->name('get.pendataan.payment');
        Route::get('finalisasi', [PendataanFinalisasi::class,'create'])->name('get.pendataan.finalisasi');
        Route::get('status', [PendataanStatus::class,'create'])->name('get.pendataan.status');
    
        Route::post('verifikasi-data', [PendataanVerifikasi::class,'store'])->name('post.pendataan.verifikasi');
        Route::post('biodata-siswa', [PendataanBiodata::class,'store'])->name('post.pendataan.biodata');
        Route::post('orang-tua', [PendataanOrtu::class,'store'])->name('post.pendataan.ortu');
        Route::post('pemberkasan', [PendataanPemberkasan::class,'store'])->name('post.pendataan.pemberkasan');
        Route::post('pembayaran-registrasi', [PendataanPayment::class,'store'])->name('post.pendataan.payment');
        Route::post('finalisasi', [PendataanFinalisasi::class,'store'])->name('post.pendataan.finalisasi');
        Route::post('status', [PendataanStatus::class,'store'])->name('post.pendataan.status');
    });

    Route::group(['prefix' => 'seleksi'], function(){
        Route::get('input-nilai', [SeleksiController::class,'create'])->name('get.seleksi.input-nilai');
        Route::get('finalisasi', [SeleksiFinalisasi::class,'create'])->name('get.seleksi.finalisasi');
        Route::get('perankingan', [SeleksiController::class,'rank'])->name('get.seleksi.perankingan');
        Route::get('status', [SeleksiStatus::class,'get'])->name('get.seleksi.status');
        Route::get('daftar-ulang', [SeleksiPayment::class,'create'])->name('get.seleksi.daftar-ulang');
        Route::get('cetak', [SeleksiStatus::class,'cetak'])->name('get.bukti-penerimaan');
    
        Route::post('input-nilai', [SeleksiController::class,'store'])->name('post.seleksi.input-nilai');
        Route::post('finalisasi', [SeleksiFinalisasi::class,'store'])->name('post.seleksi.finalisasi');
        Route::post('status', [SeleksiStatus::class,'store'])->name('post.seleksi.status');
        Route::post('daftar-ulang', [SeleksiPayment::class,'store'])->name('post.seleksi.daftar-ulang');
    });

});

Route::group(['prefix' => 'admin'], function(){
    Route::get('dashboard', [AdminDashboard::class,'dashboard'])->name('admin.dashboard');

    Route::group(['prefix' => 'utilities'], function(){
        Route::resource('users', UserController::class);

        Route::get('user', [UserController::class,'index'])->name('utilities.user'); 
        Route::get('user/{id}', [UserController::class,'show'])->name('utilities.user.detail');
        Route::post('user', [UserController::class,'update'])->name('utilities.user.update');

        Route::get('siswa', [SiswaController::class,'all'])->name('utilities.siswa');
        Route::get('siswa/{id}', [SiswaController::class,'get'])->name('utilities.siswa.detail');
        Route::get('exportsiswa', [SiswaController::class,'export'])->name('utilities.siswa.export');

        Route::get('kuota', [QuotaController::class,'get'])->name('utilities.kuota');
        Route::get('kuota/{id}', [QuotaController::class,'show'])->name('utilities.kuota.edit');
        Route::post('kuota', [QuotaController::class,'store'])->name('utilities.kouta.update');

        Route::get('feature', [FeatureController::class,'index'])->name('utilities.feature'); 
        Route::get('feature/{id}', [FeatureController::class,'show'])->name('utilities.feature.detail');
        Route::post('feature', [FeatureController::class,'store'])->name('utilities.feature.update');
    });

    Route::group(['prefix' => 'admisi-psb'], function(){
        Route::get('pendataan', [AdminPendataan::class,'filter'])->name('filterPendataan');
        Route::get('pendataan/{id}', [AdminPendataan::class,'get'])->name('show.pendataan');
        Route::post('pendataan/update', [AdminPendataan::class,'post'])->name('post.pendataan');

        Route::get('seleksi', [AdminSeleksi::class,'filter'])->name('filterSeleksi');
        Route::get('seleksi/{id}', [AdminSeleksi::class,'get'])->name('show.seleksi');
        Route::post('seleksi/post', [AdminSeleksi::class,'post'])->name('post.seleksi');

        Route::get('payment', [AdminPayment::class,'filter'])->name('filterPayment');
        Route::get('payment/{id}', [AdminPayment::class,'show'])->name('show.payment');
        Route::post('payment/post', [AdminPayment::class,'store'])->name('post.payment');
    });
    
});