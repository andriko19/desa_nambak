<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Auth\ForgotPasswordController;

use App\Http\Controllers\Front\FrontLoginController;

use App\Http\Controllers\Front\FrontLandingController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;

use App\Http\Controllers\BannerController;
use App\Http\Controllers\TentangDesaController;


Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

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
Auth::routes();

//Route::get('/', [App\Http\Controllers\HomeController::class, 'root']);
Route::get('/index', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/admin_nambak', [FrontLandingController::class, 'admin_nambak'])->name('admin_nambak');


Route::group(['middleware' => ['auth']], function () {
    Route::resource('admin/dashboard', DashboardController::class);
    Route::resource('admin/banner', BannerController::class);
    Route::resource('admin/tentang_desa', TentangDesaController::class);



    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionController::class);


});

// admin panel page
Route::post('banner/store', [BannerController::class, 'store'])->name('banner.store');
Route::get('banner/show/{id}', [BannerController::class, 'show'])->name('banner.show');
Route::post('banner/update/{id}', [BannerController::class, 'update'])->name('banner.update');
Route::get('banner/destroy/{id}', [BannerController::class, 'destroy'])->name('banner.destroy');

Route::post('tentang_desa/store', [TentangDesaController::class, 'store'])->name('tentang_desa.store');
Route::get('tentang_desa/show/{id}', [TentangDesaController::class, 'show'])->name('tentang_desa.show');
Route::post('tentang_desa/update/{id}', [TentangDesaController::class, 'update'])->name('tentang_desa.update');
Route::get('tentang_desa/destroy/{id}', [TentangDesaController::class, 'destroy'])->name('tentang_desa.destroy');

// leanding page
Route::get('/', [FrontLandingController::class, 'index'])->name('landing');
Route::get('/semua_galeri', [FrontLandingController::class, 'semua_galeri'])->name('semua_galeri');
Route::get('/profil_desa', [FrontLandingController::class, 'profil_desa'])->name('profil_desa');
Route::get('/semua_berita', [FrontLandingController::class, 'semua_berita'])->name('semua_berita');
Route::get('/detail_berita', [FrontLandingController::class, 'detail_berita'])->name('detail_berita');
Route::get('/jumlah_remaja_preventif_jenis_kelamin_dan_usia', [FrontLandingController::class, 'jumlah_remaja_preventif_jenis_kelamin_dan_usia'])->name('jumlah_remaja_preventif_jenis_kelamin_dan_usia');
Route::get('/contact', [FrontLandingController::class, 'contact'])->name('contact');
Route::get('/testimoni', [FrontLandingController::class, 'testimoni'])->name('testimoni');



