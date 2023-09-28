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
use App\Http\Controllers\LayananController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\DataInformasiController;
use App\Http\Controllers\TagController;

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
    Route::resource('admin/layanan', LayananController::class);
    Route::resource('admin/galeri', GaleriController::class);
    Route::resource('admin/testimoni', TestimoniController::class);
    Route::resource('admin/berita', BeritaController::class);
    Route::resource('admin/footer', FooterController::class);
    Route::resource('admin/kontak', KontakController::class);
    Route::resource('admin/data_informasi', DataInformasiController::class);
    Route::resource('admin/tag', TagController::class);

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

Route::post('layanan/store', [LayananController::class, 'store'])->name('layanan.store');
Route::get('layanan/show/{id}', [LayananController::class, 'show'])->name('layanan.show');
Route::post('layanan/update/{id}', [LayananController::class, 'update'])->name('layanan.update');
Route::get('layanan/destroy/{id}', [LayananController::class, 'destroy'])->name('layanan.destroy');

Route::post('galeri/store', [GaleriController::class, 'store'])->name('galeri.store');
Route::get('galeri/show/{id}', [GaleriController::class, 'show'])->name('galeri.show');
Route::post('galeri/update/{id}', [GaleriController::class, 'update'])->name('galeri.update');
Route::get('galeri/destroy/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');

Route::post('testimoni/store', [TestimoniController::class, 'store'])->name('testimoni.store');
Route::post('konseling/store', [FormController::class, 'store'])->name('konseling.store');

Route::post('berita/store', [BeritaController::class, 'store'])->name('berita.store');
Route::get('berita/show/{id}', [BeritaController::class, 'show'])->name('berita.show');
Route::post('berita/update/{id}', [BeritaController::class, 'update'])->name('berita.update');
Route::get('berita/destroy/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');

Route::post('footer/store', [FooterController::class, 'store'])->name('footer.store');
Route::get('footer/show/{id}', [FooterController::class, 'show'])->name('footer.show');
Route::post('footer/update/{id}', [FooterController::class, 'update'])->name('footer.update');
Route::get('footer/destroy/{id}', [FooterController::class, 'destroy'])->name('footer.destroy');

Route::post('kontak/store', [KontakController::class, 'store'])->name('kontak.store');
Route::get('kontak/show/{id}', [KontakController::class, 'show'])->name('kontak.show');
Route::post('kontak/update/{id}', [KontakController::class, 'update'])->name('kontak.update');
Route::get('kontak/destroy/{id}', [KontakController::class, 'destroy'])->name('kontak.destroy');

Route::post('data_informasi/store', [DataInformasiController::class, 'store'])->name('data_informasi.store');
Route::get('data_informasi/show/{id}', [DataInformasiController::class, 'show'])->name('data_informasi.show');
Route::post('data_informasi/update/{id}', [DataInformasiController::class, 'update'])->name('data_informasi.update');
Route::get('data_informasi/destroy/{id}', [DataInformasiController::class, 'destroy'])->name('data_informasi.destroy');

Route::post('tag/store', [TagController::class, 'store'])->name('tag.store');
Route::get('tag/show/{id}', [TagController::class, 'show'])->name('tag.show');
Route::post('tag/update/{id}', [TagController::class, 'update'])->name('tag.update');
Route::get('tag/destroy/{id}', [TagController::class, 'destroy'])->name('tag.destroy');

// leanding page
Route::get('/', [FrontLandingController::class, 'index'])->name('landing');
Route::get('/semua_galeri', [FrontLandingController::class, 'semua_galeri'])->name('semua_galeri');
Route::get('/profil_desa', [FrontLandingController::class, 'profil_desa'])->name('profil_desa');
Route::get('/semua_berita', [FrontLandingController::class, 'semua_berita'])->name('semua_berita');
Route::get('/detail_berita/{id}', [FrontLandingController::class, 'detail_berita'])->name('detail_berita');

Route::get('/jumlah_penduduk', [FrontLandingController::class, 'jumlah_penduduk'])->name('jumlah_penduduk');
Route::get('/informasi_reproduksi_perempuan', [FrontLandingController::class, 'informasi_reproduksi_perempuan'])->name('informasi_reproduksi_perempuan');
Route::get('/informasi_reproduksi_lakilaki', [FrontLandingController::class, 'informasi_reproduksi_lakilaki'])->name('informasi_reproduksi_lakilaki');
Route::get('/pendidikan_seksual_pencegahan', [FrontLandingController::class, 'pendidikan_seksual_pencegahan'])->name('pendidikan_seksual_pencegahan');
Route::get('/komunikasi_terbuka', [FrontLandingController::class, 'komunikasi_terbuka'])->name('komunikasi_terbuka');
Route::get('/kepercayaan_diri_dan_keterampilan_pengambilan_keputusan', [FrontLandingController::class, 'kepercayaan_diri_dan_keterampilan_pengambilan_keputusan'])->name('kepercayaan_diri_dan_keterampilan_pengambilan_keputusan');
Route::get('/membangun_nilai_diri_yang_positif', [FrontLandingController::class, 'membangun_nilai_diri_yang_positif'])->name('membangun_nilai_diri_yang_positif');
Route::get('/menghindari_tekanan_teman_sebaya', [FrontLandingController::class, 'menghindari_tekanan_teman_sebaya'])->name('menghindari_tekanan_teman_sebaya');
Route::get('/memahami_konsekuensi_dan_resiko_perilaku_seks_bebas', [FrontLandingController::class, 'memahami_konsekuensi_dan_resiko_perilaku_seks_bebas'])->name('memahami_konsekuensi_dan_resiko_perilaku_seks_bebas');
Route::get('/pendidikan_seksual_penanganan_remaja', [FrontLandingController::class, 'pendidikan_seksual_penanganan_remaja'])->name('pendidikan_seksual_penanganan_remaja');
Route::get('/konseling_keluarga', [FrontLandingController::class, 'konseling_keluarga'])->name('konseling_keluarga');
Route::get('/pemahaman_tanggung_jawab', [FrontLandingController::class, 'pemahaman_tanggung_jawab'])->name('pemahaman_tanggung_jawab');
Route::get('/pengendalian_emosi', [FrontLandingController::class, 'pengendalian_emosi'])->name('pengendalian_emosi');
Route::get('/perlindungan_hukum', [FrontLandingController::class, 'perlindungan_hukum'])->name('perlindungan_hukum');
// page khusus start
Route::get('/layanan_internal', [FrontLandingController::class, 'layanan_internal'])->name('layanan_internal');
Route::get('/layanan_konseling', [FrontLandingController::class, 'layanan_konseling'])->name('layanan_konseling');
Route::get('/form_pengaduan_masyarakat', [FrontLandingController::class, 'form_pengaduan_masyarakat'])->name('form_pengaduan_masyarakat');
// end
Route::get('/cara_mendidikan_anak', [FrontLandingController::class, 'cara_mendidikan_anak'])->name('cara_mendidikan_anak');
Route::get('/mengambangkan_hubungan_yang_sehat_pada_anak', [FrontLandingController::class, 'mengambangkan_hubungan_yang_sehat_pada_anak'])->name('mengambangkan_hubungan_yang_sehat_pada_anak');
Route::get('/membangun_komunikasi_yang_baik', [FrontLandingController::class, 'membangun_komunikasi_yang_baik'])->name('membangun_komunikasi_yang_baik');
Route::get('/mendorong_perkembangan_anak', [FrontLandingController::class, 'mendorong_perkembangan_anak'])->name('mendorong_perkembangan_anak');
Route::get('/menerapkan_aturan_dan_batasan', [FrontLandingController::class, 'menerapkan_aturan_dan_batasan'])->name('menerapkan_aturan_dan_batasan');
Route::get('/perkembangan_anak', [FrontLandingController::class, 'perkembangan_anak'])->name('perkembangan_anak');





Route::get('/detail_data_dan_informasi/{id}', [FrontLandingController::class, 'detail_data_dan_informasi'])->name('detail_data_dan_informasi');
Route::get('/contact', [FrontLandingController::class, 'contact'])->name('contact');
Route::get('/testimoni', [FrontLandingController::class, 'testimoni'])->name('testimoni');



