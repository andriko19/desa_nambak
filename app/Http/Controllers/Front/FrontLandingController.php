<?php

namespace App\Http\Controllers\Front;


use App\Models\Banner_model;
use App\Models\Berita_model;
use App\Models\File;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FrontLandingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_nambak()
    {
        $title = 'home';
        $pages = 'landing';

        return view('front/signin', compact('title', 'pages'));
    }

    public function index(Request $request)
    {
        $title = 'Desa Nambak';
        $pages = 'landing';

        // Banner
        $BannerByUcapan = DB::table('tbl_banner')->where('jenis', 'Pembuka')->orderBy('id', 'DESC')->get();
        $BannerByHighlight = DB::table('tbl_banner')->where('jenis', 'Highlight')->orderBy('id', 'DESC')->get();

        // Tentang desa
        $TentangDesaByMoto = DB::table('tbl_tentang_desa')->where('jenis', 'Moto')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $TentangDesaByKeunggulan = DB::table('tbl_tentang_desa')->where('jenis', 'Keunggulan')->get();
        $TentangDesaByPrakataPertanyaan = DB::table('tbl_tentang_desa')->where('jenis', 'Prakata Pertanyaan')->orderBy('id', 'DESC')->get();
        $TentangDesaByPertanyaanUmum = DB::table('tbl_tentang_desa')->where('jenis', 'Pertanyaan Umum')->get();

        // Layanan
        $FotoKades = DB::table('tbl_layanan')->where('jenis', 'Foto Kades')->orderBy('id', 'DESC')->get();
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();

        // Galeri
        $Galeri = DB::table('tbl_galeri')->orderBy('id', 'DESC')->limit(6)->get();

        // Testimoni
        $Testimoni = DB::table('tbl_testimoni')->orderBy('id', 'DESC')->limit(6)->get();

        // Berita
        $Berita = DB::table('tbl_berita')->orderBy('id', 'DESC')->limit(3)->get();

        // Parkata Footer
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();
        
        // dd(count($PrakataFooter));
        return view('frontend/index', compact('title', 'pages', 'BannerByUcapan', 'BannerByHighlight', 'TentangDesaByMoto', 'TentangDesaByProfil', 'TentangDesaByKeunggulan', 'TentangDesaByPrakataPertanyaan', 'TentangDesaByPertanyaanUmum', 'FotoKades', 'Layanan', 'Galeri', 'Testimoni', 'Berita', 'PrakataFooter', 'HariLayanan', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    public function semua_galeri(Request $request)
    {
        $title = 'Galeri';
        $pages = 'landing';
        $AllGaleri = DB::table('tbl_galeri')->orderBy('id', 'DESC')->get();

        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();

        // Parkata Footer
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();
         

        return view('frontend/semua_galeri', compact('title', 'pages', 'AllGaleri', 'TentangDesaByProfil', 'Layanan', 'PrakataFooter', 'HariLayanan', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    public function semua_berita(Request $request)
    {
        $title = 'Berita';
        $pages = 'landing';

        $AllBerita = DB::table('tbl_berita')->orderBy('id', 'DESC')->limit(5)->get();
        $Berita = DB::table('tbl_berita')->orderBy('id', 'DESC')->limit(3)->get();
        $AllTag = DB::table('tbl_tag')->orderBy('judul', 'ASC')->get();

        // Kontak Head and Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/semua_berita', compact('title', 'pages', 'AllBerita', 'Berita', 'AllTag', 'Layanan', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    public function detail_berita(Request $request, $id)
    {
        $title = 'Detail Berita';
        $pages = 'landing';

        $Berita = DB::table('tbl_berita')->orderBy('id', 'DESC')->limit(3)->get();
        $DetailBerita = DB::table('tbl_berita')->where('id', $id)->get();
        
        // Kontak Head and Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/detail_berita', compact('title', 'pages', 'Berita', 'DetailBerita', 'Layanan', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    public function profil_desa(Request $request)
    {
        $title = 'Profil Desa';
        $pages = 'landing';

        // Data Profil Desa
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $FotoKades = DB::table('tbl_layanan')->where('jenis', 'Foto Kades')->orderBy('id', 'DESC')->get();

        // Kontak Head and Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/profil_desa', compact('title', 'pages', 'FotoKades', 'Layanan', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    public function jumlah_penduduk(Request $request)
    {
        $title = 'Jumlah Penduduk';
        $pages = 'landing';

        // data jumlahh penduduk
        $AllDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Jumlah Penduduk')->orderBy('id', 'DESC')->limit(5)->get();
        $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Jumlah Penduduk')->orderBy('id', 'DESC')->limit(3)->get();
        $AllTag = DB::table('tbl_tag')->orderBy('judul', 'ASC')->get();

        // Kontak Head and Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/semua_data_dan_informasi', compact('title', 'pages', 'AllDataInformasi', 'ListLiftDataInformasi', 'AllTag', 'Layanan', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    public function informasi_reproduksi_perempuan(Request $request)
    {
        $title = 'Informasi Reproduksi Perempuan';
        $pages = 'landing';

        // data jumlahh penduduk
        $AllDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Informasi Reproduksi Perempuan')->orderBy('id', 'DESC')->limit(5)->get();
        $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Informasi Reproduksi Perempuan')->orderBy('id', 'DESC')->limit(3)->get();
        $AllTag = DB::table('tbl_tag')->orderBy('judul', 'ASC')->get();

        // Kontak Head and Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/semua_data_dan_informasi', compact('title', 'pages', 'AllDataInformasi', 'ListLiftDataInformasi', 'AllTag', 'Layanan', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    public function informasi_reproduksi_lakilaki(Request $request)
    {
        $title = 'Informasi Reproduksi Laki-laki';
        $pages = 'landing';

        // data jumlahh penduduk
        $AllDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Informasi Reproduksi Laki-laki')->orderBy('id', 'DESC')->limit(5)->get();
        $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Informasi Reproduksi Laki-laki')->orderBy('id', 'DESC')->limit(3)->get();
        $AllTag = DB::table('tbl_tag')->orderBy('judul', 'ASC')->get();

        // Kontak Head and Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/semua_data_dan_informasi', compact('title', 'pages', 'AllDataInformasi', 'ListLiftDataInformasi', 'AllTag', 'Layanan', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    public function pendidikan_seksual_pencegahan(Request $request)
    {
        $title = 'Pendidikan Seksual';
        $pages = 'landing';

        // data jumlahh penduduk
        $AllDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Pendidikan Seksual (Pencegahan)')->orderBy('id', 'DESC')->limit(5)->get();
        $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Pendidikan Seksual (Pencegahan)')->orderBy('id', 'DESC')->limit(3)->get();
        $AllTag = DB::table('tbl_tag')->orderBy('judul', 'ASC')->get();

        // Kontak Head and Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/semua_data_dan_informasi', compact('title', 'pages', 'AllDataInformasi', 'ListLiftDataInformasi', 'AllTag', 'Layanan', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    public function komunikasi_terbuka(Request $request)
    {
        $title = 'Komunikasi Terbuka';
        $pages = 'landing';

        // data jumlahh penduduk
        $AllDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Komunikasi Terbuka')->orderBy('id', 'DESC')->limit(5)->get();
        $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Komunikasi Terbuka')->orderBy('id', 'DESC')->limit(3)->get();
        $AllTag = DB::table('tbl_tag')->orderBy('judul', 'ASC')->get();

        // Kontak Head and Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/semua_data_dan_informasi', compact('title', 'pages', 'AllDataInformasi', 'ListLiftDataInformasi', 'AllTag', 'Layanan', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    public function kepercayaan_diri_dan_keterampilan_pengambilan_keputusan(Request $request)
    {
        $title = 'Kepercayaan Diri dan Keterampilan Pengambilan Keputusan';
        $pages = 'landing';

        // data jumlahh penduduk
        $AllDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Kepercayaan Diri dan Keterampilan Pengambilan Keputusan')->orderBy('id', 'DESC')->limit(5)->get();
        $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Kepercayaan Diri dan Keterampilan Pengambilan Keputusan')->orderBy('id', 'DESC')->limit(3)->get();
        $AllTag = DB::table('tbl_tag')->orderBy('judul', 'ASC')->get();

        // Kontak Head and Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/semua_data_dan_informasi', compact('title', 'pages', 'AllDataInformasi', 'ListLiftDataInformasi', 'AllTag', 'Layanan', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    public function membangun_nilai_diri_yang_positif(Request $request)
    {
        $title = 'Membangun Nilai Diri Yang Positif';
        $pages = 'landing';

        // data jumlahh penduduk
        $AllDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Membangun Nilai Diri Yang Positif')->orderBy('id', 'DESC')->limit(5)->get();
        $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Membangun Nilai Diri Yang Positif')->orderBy('id', 'DESC')->limit(3)->get();
        $AllTag = DB::table('tbl_tag')->orderBy('judul', 'ASC')->get();

        // Kontak Head and Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/semua_data_dan_informasi', compact('title', 'pages', 'AllDataInformasi', 'ListLiftDataInformasi', 'AllTag', 'Layanan', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    public function menghindari_tekanan_teman_sebaya(Request $request)
    {
        $title = 'Menghindari Tekanan Teman Sebaya';
        $pages = 'landing';

        // data jumlahh penduduk
        $AllDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Menghindari Tekanan Teman Sebaya')->orderBy('id', 'DESC')->limit(5)->get();
        $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Menghindari Tekanan Teman Sebaya')->orderBy('id', 'DESC')->limit(3)->get();
        $AllTag = DB::table('tbl_tag')->orderBy('judul', 'ASC')->get();

        // Kontak Head and Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/semua_data_dan_informasi', compact('title', 'pages', 'AllDataInformasi', 'ListLiftDataInformasi', 'AllTag', 'Layanan', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    public function memahami_konsekuensi_dan_resiko_perilaku_seks_bebas(Request $request)
    {
        $title = 'Memahami Konsekuensi dan Resiko Perilaku Seks Bebas';
        $pages = 'landing';

        // data jumlahh penduduk
        $AllDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Memahami Konsekuensi dan Resiko Perilaku Seks Bebas')->orderBy('id', 'DESC')->limit(5)->get();
        $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Memahami Konsekuensi dan Resiko Perilaku Seks Bebas')->orderBy('id', 'DESC')->limit(3)->get();
        $AllTag = DB::table('tbl_tag')->orderBy('judul', 'ASC')->get();

        // Kontak Head and Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/semua_data_dan_informasi', compact('title', 'pages', 'AllDataInformasi', 'ListLiftDataInformasi', 'AllTag', 'Layanan', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    public function pendidikan_seksual_penanganan_remaja(Request $request)
    {
        $title = 'Pendidikan Seksual';
        $pages = 'landing';

        // data jumlahh penduduk
        $AllDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Pendidikan Seksual (Penanganan Remaja)')->orderBy('id', 'DESC')->limit(5)->get();
        $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Pendidikan Seksual (Penanganan Remaja)')->orderBy('id', 'DESC')->limit(3)->get();
        $AllTag = DB::table('tbl_tag')->orderBy('judul', 'ASC')->get();

        // Kontak Head and Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/semua_data_dan_informasi', compact('title', 'pages', 'AllDataInformasi', 'ListLiftDataInformasi', 'AllTag', 'Layanan', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    public function konseling_keluarga(Request $request)
    {
        $title = 'Konseling Keluarga';
        $pages = 'landing';

        // data jumlahh penduduk
        $AllDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Konseling Keluarga')->orderBy('id', 'DESC')->limit(5)->get();
        $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Konseling Keluarga')->orderBy('id', 'DESC')->limit(3)->get();
        $AllTag = DB::table('tbl_tag')->orderBy('judul', 'ASC')->get();

        // Kontak Head and Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/semua_data_dan_informasi', compact('title', 'pages', 'AllDataInformasi', 'ListLiftDataInformasi', 'AllTag', 'Layanan', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    public function pemahaman_tanggung_jawab(Request $request)
    {
        $title = 'Pemahaman Tanggung Jawab';
        $pages = 'landing';

        // data jumlahh penduduk
        $AllDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Pemahaman Tanggung Jawab')->orderBy('id', 'DESC')->limit(5)->get();
        $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Pemahaman Tanggung Jawab')->orderBy('id', 'DESC')->limit(3)->get();
        $AllTag = DB::table('tbl_tag')->orderBy('judul', 'ASC')->get();

        // Kontak Head and Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/semua_data_dan_informasi', compact('title', 'pages', 'AllDataInformasi', 'ListLiftDataInformasi', 'AllTag', 'Layanan', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    public function pengendalian_emosi(Request $request)
    {
        $title = 'Pengendalian Emosi';
        $pages = 'landing';

        // data jumlahh penduduk
        $AllDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Pengendalian Emosi')->orderBy('id', 'DESC')->limit(5)->get();
        $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Pengendalian Emosi')->orderBy('id', 'DESC')->limit(3)->get();
        $AllTag = DB::table('tbl_tag')->orderBy('judul', 'ASC')->get();

        // Kontak Head and Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/semua_data_dan_informasi', compact('title', 'pages', 'AllDataInformasi', 'ListLiftDataInformasi', 'AllTag', 'Layanan', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    public function perlindungan_hukum(Request $request)
    {
        $title = 'Perlindungan Hukum';
        $pages = 'landing';

        // data jumlahh penduduk
        $AllDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Perlindungan Hukum')->orderBy('id', 'DESC')->limit(5)->get();
        $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Perlindungan Hukum')->orderBy('id', 'DESC')->limit(3)->get();
        $AllTag = DB::table('tbl_tag')->orderBy('judul', 'ASC')->get();

        // Kontak Head and Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/semua_data_dan_informasi', compact('title', 'pages', 'AllDataInformasi', 'ListLiftDataInformasi', 'AllTag', 'Layanan', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    // start khusus 3 route
    public function layanan_internal(Request $request)
    {
        $title = 'Layanan Internal';
        $pages = 'landing';

        // data jumlahh penduduk
        $AllDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Layanan Internal')->orderBy('id', 'DESC')->limit(5)->get();
        $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Layanan Internal')->orderBy('id', 'DESC')->limit(3)->get();
        $AllTag = DB::table('tbl_tag')->orderBy('judul', 'ASC')->get();

        // Kontak Head and Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/semua_data_dan_informasi', compact('title', 'pages', 'AllDataInformasi', 'ListLiftDataInformasi', 'AllTag', 'Layanan', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    public function layanan_konseling(Request $request)
    {
        $title = 'Layanan Konseling';
        $pages = 'landing';

        // Kontak Head and Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/layanan_konseling', compact('title', 'pages', 'Layanan', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    public function form_pengaduan_masyarakat(Request $request)
    {
        $title = 'Form Pengaduan Masyarakat';
        $pages = 'landing';

        // data jumlahh penduduk
        $AllDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Form Pengaduan Masyarakat')->orderBy('id', 'DESC')->limit(5)->get();
        $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Form Pengaduan Masyarakat')->orderBy('id', 'DESC')->limit(3)->get();
        $AllTag = DB::table('tbl_tag')->orderBy('judul', 'ASC')->get();

        // Kontak Head and Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/semua_data_dan_informasi', compact('title', 'pages', 'AllDataInformasi', 'ListLiftDataInformasi', 'AllTag', 'Layanan', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }
    // End
    
    public function cara_mendidikan_anak(Request $request)
    {
        $title = 'Cara Mendidikan Anak';
        $pages = 'landing';

        // data jumlahh penduduk
        $AllDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Cara Mendidikan Anak')->orderBy('id', 'DESC')->limit(5)->get();
        $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Cara Mendidikan Anak')->orderBy('id', 'DESC')->limit(3)->get();
        $AllTag = DB::table('tbl_tag')->orderBy('judul', 'ASC')->get();

        // Kontak Head and Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/semua_data_dan_informasi', compact('title', 'pages', 'AllDataInformasi', 'ListLiftDataInformasi', 'AllTag', 'Layanan', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    public function mengambangkan_hubungan_yang_sehat_pada_anak(Request $request)
    {
        $title = 'Mengambangkan Hubungan Yang Sehat Pada Anak';
        $pages = 'landing';

        // data jumlahh penduduk
        $AllDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Mengambangkan Hubungan Yang Sehat Pada Anak')->orderBy('id', 'DESC')->limit(5)->get();
        $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Mengambangkan Hubungan Yang Sehat Pada Anak')->orderBy('id', 'DESC')->limit(3)->get();
        $AllTag = DB::table('tbl_tag')->orderBy('judul', 'ASC')->get();

        // Kontak Head and Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/semua_data_dan_informasi', compact('title', 'pages', 'AllDataInformasi', 'ListLiftDataInformasi', 'AllTag', 'Layanan', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    public function membangun_komunikasi_yang_baik(Request $request)
    {
        $title = 'Membangun Komunikasi Yang Baik';
        $pages = 'landing';

        // data jumlahh penduduk
        $AllDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Membangun Komunikasi Yang Baik')->orderBy('id', 'DESC')->limit(5)->get();
        $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Membangun Komunikasi Yang Baik')->orderBy('id', 'DESC')->limit(3)->get();
        $AllTag = DB::table('tbl_tag')->orderBy('judul', 'ASC')->get();

        // Kontak Head and Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/semua_data_dan_informasi', compact('title', 'pages', 'AllDataInformasi', 'ListLiftDataInformasi', 'AllTag', 'Layanan', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    public function mendorong_perkembangan_anak(Request $request)
    {
        $title = 'Mendorong Perkembangan Anak';
        $pages = 'landing';

        // data jumlahh penduduk
        $AllDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Mendorong Perkembangan Anak')->orderBy('id', 'DESC')->limit(5)->get();
        $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Mendorong Perkembangan Anak')->orderBy('id', 'DESC')->limit(3)->get();
        $AllTag = DB::table('tbl_tag')->orderBy('judul', 'ASC')->get();

        // Kontak Head and Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/semua_data_dan_informasi', compact('title', 'pages', 'AllDataInformasi', 'ListLiftDataInformasi', 'AllTag', 'Layanan', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    public function menerapkan_aturan_dan_batasan(Request $request)
    {
        $title = 'Menerapkan Aturan dan Batasan';
        $pages = 'landing';

        // data jumlahh penduduk
        $AllDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Menerapkan Aturan dan Batasan')->orderBy('id', 'DESC')->limit(5)->get();
        $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Menerapkan Aturan dan Batasan')->orderBy('id', 'DESC')->limit(3)->get();
        $AllTag = DB::table('tbl_tag')->orderBy('judul', 'ASC')->get();

        // Kontak Head and Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/semua_data_dan_informasi', compact('title', 'pages', 'AllDataInformasi', 'ListLiftDataInformasi', 'AllTag', 'Layanan', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    public function perkembangan_anak(Request $request)
    {
        $title = 'Perkembangan Anak';
        $pages = 'landing';

        // data jumlahh penduduk
        $AllDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Perkembangan Anak')->orderBy('id', 'DESC')->limit(5)->get();
        $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', 'Perkembangan Anak')->orderBy('id', 'DESC')->limit(3)->get();
        $AllTag = DB::table('tbl_tag')->orderBy('judul', 'ASC')->get();

        // Kontak Head and Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/semua_data_dan_informasi', compact('title', 'pages', 'AllDataInformasi', 'ListLiftDataInformasi', 'AllTag', 'Layanan', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    public function detail_data_dan_informasi(Request $request, $id)
    {
        $title = 'Detail Data dan Informasi';
        $pages = 'landing';

        $DetailDataInformasi = DB::table('tbl_data_dan_informasi')->where('id', $id)->get();
        
        if ($DetailDataInformasi[0]->jenis == "Jumlah Penduduk") {
            $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', $DetailDataInformasi[0]->jenis)->orderBy('id', 'DESC')->limit(3)->get();
        } else if ($DetailDataInformasi[0]->jenis == "Informasi Reproduksi Perempuan") {
            $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', $DetailDataInformasi[0]->jenis)->orderBy('id', 'DESC')->limit(3)->get();
        } else if ($DetailDataInformasi[0]->jenis == "Informasi Reproduksi Laki-laki") {
            $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', $DetailDataInformasi[0]->jenis)->orderBy('id', 'DESC')->limit(3)->get();
        } else if ($DetailDataInformasi[0]->jenis == "Pendidikan Seksual (Pencegahan)") {
            $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', $DetailDataInformasi[0]->jenis)->orderBy('id', 'DESC')->limit(3)->get();
        } else if ($DetailDataInformasi[0]->jenis == "Komunikasi Terbuka") {
            $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', $DetailDataInformasi[0]->jenis)->orderBy('id', 'DESC')->limit(3)->get();
        } else if ($DetailDataInformasi[0]->jenis == "Kepercayaan Diri dan Keterampilan Pengambilan Keputusan") {
            $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', $DetailDataInformasi[0]->jenis)->orderBy('id', 'DESC')->limit(3)->get();
        } else if ($DetailDataInformasi[0]->jenis == "Membangun Nilai Diri Yang Positif") {
            $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', $DetailDataInformasi[0]->jenis)->orderBy('id', 'DESC')->limit(3)->get();
        } else if ($DetailDataInformasi[0]->jenis == "Menghindari Tekanan Teman Sebaya") {
            $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', $DetailDataInformasi[0]->jenis)->orderBy('id', 'DESC')->limit(3)->get();
        } else if ($DetailDataInformasi[0]->jenis == "Memahami Konsekuensi dan Resiko Perilaku Seks Bebas") {
            $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', $DetailDataInformasi[0]->jenis)->orderBy('id', 'DESC')->limit(3)->get();
        } else if ($DetailDataInformasi[0]->jenis == "Pendidikan Seksual (Penanganan Remaja)") {
            $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', $DetailDataInformasi[0]->jenis)->orderBy('id', 'DESC')->limit(3)->get();
        } else if ($DetailDataInformasi[0]->jenis == "Konseling Keluarga") {
            $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', $DetailDataInformasi[0]->jenis)->orderBy('id', 'DESC')->limit(3)->get();
        } else if ($DetailDataInformasi[0]->jenis == "Pemahaman Tanggung Jawab") {
            $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', $DetailDataInformasi[0]->jenis)->orderBy('id', 'DESC')->limit(3)->get();
        } else if ($DetailDataInformasi[0]->jenis == "Pengemdalian Emosi") {
            $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', $DetailDataInformasi[0]->jenis)->orderBy('id', 'DESC')->limit(3)->get();
        } else if ($DetailDataInformasi[0]->jenis == "Perlindungan Hukum") {
            $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', $DetailDataInformasi[0]->jenis)->orderBy('id', 'DESC')->limit(3)->get();
        } else if ($DetailDataInformasi[0]->jenis == "Cara Mendidikan Anak") {
            $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', $DetailDataInformasi[0]->jenis)->orderBy('id', 'DESC')->limit(3)->get();
        } else if ($DetailDataInformasi[0]->jenis == "Mengambangkan Hubungan Yang Sehat Pada Anak") {
            $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', $DetailDataInformasi[0]->jenis)->orderBy('id', 'DESC')->limit(3)->get();
        } else if ($DetailDataInformasi[0]->jenis == "Membangun Komunikasi Yang Baik") {
            $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', $DetailDataInformasi[0]->jenis)->orderBy('id', 'DESC')->limit(3)->get();
        } else if ($DetailDataInformasi[0]->jenis == "Mendorong Perkembangan Anak") {
            $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', $DetailDataInformasi[0]->jenis)->orderBy('id', 'DESC')->limit(3)->get();
        } else if ($DetailDataInformasi[0]->jenis == "Menerapkan Aturan dan Batasan") {
            $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', $DetailDataInformasi[0]->jenis)->orderBy('id', 'DESC')->limit(3)->get();
        } else if ($DetailDataInformasi[0]->jenis == "Perkembangan Anak") {
            $ListLiftDataInformasi = DB::table('tbl_data_dan_informasi')->where('jenis', $DetailDataInformasi[0]->jenis)->orderBy('id', 'DESC')->limit(3)->get();
        }
        
        // Kontak Head and Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/detail_data_dan_informasi', compact('title', 'pages', 'ListLiftDataInformasi', 'DetailDataInformasi', 'Layanan', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    public function contact(Request $request)
    {
        $title = 'Kontak';
        $pages = 'landing';

        // Data Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
       
        // Data Kontak
        $KontakByAlamat = DB::table('tbl_kontak')->where('jenis', 'Alamat')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/contact', compact('title', 'pages', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'Layanan', 'KontakByAlamat', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }

    public function testimoni(Request $request)
    {
        $title = 'Testimoni';
        $pages = 'landing';

        // Kontak Head and Footer
        $Layanan = DB::table('tbl_layanan')->where('jenis', 'Layanan')->orderBy('judul', 'ASC')->get();
        $PrakataFooter = DB::table('tbl_footer')->where('jenis', 'Prakata')->orderBy('id', 'DESC')->get();
        $HariLayanan = DB::table('tbl_footer')->where('jenis', 'Oprasional')->orderBy('id', 'DESC')->get();
        $TentangDesaByProfil = DB::table('tbl_tentang_desa')->where('jenis', 'Profil')->orderBy('id', 'DESC')->get();
        $KontakByEmail = DB::table('tbl_kontak')->where('jenis', 'Email')->orderBy('id', 'DESC')->get();
        $KontakByTelepon = DB::table('tbl_kontak')->where('jenis', 'Telepon')->orderBy('id', 'DESC')->get();
        $KontakByInstagram = DB::table('tbl_kontak')->where('jenis', 'Instagram')->orderBy('id', 'DESC')->get();
        $KontakByTikTok = DB::table('tbl_kontak')->where('jenis', 'TikTok')->orderBy('id', 'DESC')->get();
        $KontakByLinkedIn = DB::table('tbl_kontak')->where('jenis', 'LinkedIn')->orderBy('id', 'DESC')->get();
        $KontakByTwitter = DB::table('tbl_kontak')->where('jenis', 'Twitter')->orderBy('id', 'DESC')->get();
        $KontakByFacebook = DB::table('tbl_kontak')->where('jenis', 'Facebook')->orderBy('id', 'DESC')->get();

        return view('frontend/testimoni', compact('title', 'pages', 'Layanan', 'PrakataFooter', 'HariLayanan', 'TentangDesaByProfil', 'KontakByEmail', 'KontakByTelepon', 'KontakByInstagram', 'KontakByTikTok', 'KontakByLinkedIn', 'KontakByTwitter', 'KontakByFacebook'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_collection_models =  DB::table('product_collection_models')->get();
        $product_type_models =  DB::table('product_type_models')->get();
        $product_form_models =  DB::table('product_form_models')->get();
        $product_package_models =  DB::table('product_package_models')->get();
        return view('products/create', compact('product_collection_models', 'product_type_models', 'product_form_models', 'product_package_models'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'product_name' => 'required'
        ]);

        $files = [];
        if ($request->hasfile('filenames')) {
            foreach ($request->file('filenames') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('files/product-images'), $name);
                $files[] = $name;
            }
        }

        $product_models = Product_model::create([
            'sku' => $request->sku,
            'product_name' => $request->product_name,
            'product_detail' => $request->product_detail,
            'product_shortdetail' => $request->product_shortdetail,
            'product_brand' => $request->product_brand,
            'product_collection' => $request->product_collection,
            'product_type' => $request->product_type,
            'product_form' => $request->product_form,
            'product_package' => $request->product_package,
            'product_price' => $request->product_price,
            'product_price_currency' => $request->product_price_currency,
            'product_weight' => $request->product_weight,
            'product_width' => $request->product_width,
            'product_height' => $request->product_height,
            'product_length' => $request->product_length,
            'product_acidityscore' => $request->product_acidityscore,
            'product_aciditydesc' => $request->product_aciditydesc,
            'product_bodyscore' => $request->product_bodyscore,
            'product_bodydesc' => $request->product_bodydesc,
            'product_roastdesc' => $request->product_roastdesc,
            'product_typedesc' => $request->product_typedesc,
            'product_intensity' => $request->product_intensity,
            'fileimages' => $files,
            'status_stock' => $request->status_stock,
            'status' => $request->status
        ]);

        if ($product_models) {
            return redirect()
                ->route('products.index')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $pict = [];
        // $images = DB::table('files')->where('files.id_product', '=', $id)->get();

        // for ($p = 0; $p < count($images); $p++) {
        //     $pct = $images[$p]->filenames;
        //     $fileimages = json_decode($images[$p]->filenames);

        //     for ($gimg = 0; $gimg < count($fileimages); $gimg++) {
        //         $imgs =  $fileimages[$gimg];
        //         array_push($pict, $imgs);
        //     }

        // }

        $product_models = [];
        $product_models_array = [];


        $product_models_res =  DB::select('select pm.*, pcm.product_collection_name, ptm.product_type_name,
                pfm.product_form_name,
                ppm.product_package_name,
            (select discount_models.discount from discount_models
            LEFT JOIN discount_cluster_models as dcm on discount_models.discount_cluster_id = dcm.id
            where  (NOW() >= dcm.active_date AND NOW() <= dcm.off_date) and discount_models.product_id = pm.id
						 )
						as disc_event,
						(select dcm.nama from discount_models
            LEFT JOIN discount_cluster_models as dcm on discount_models.discount_cluster_id = dcm.id
            where  (NOW() >= dcm.active_date AND NOW() <= dcm.off_date) and discount_models.product_id = pm.id
						 )
						as event_promo
            from product_models as pm
            LEFT JOIN product_collection_models as pcm on pcm.id = pm.product_collection
            LEFT JOIN product_type_models as ptm on ptm.id = pm.product_collection
            LEFT JOIN product_form_models as pfm on pfm.id = pm.product_collection
            LEFT JOIN product_package_models as ppm on ppm.id = pm.product_collection
            where pm.id =
            ' . $id);


        // $product_models_res =  DB::table('product_models')
        //     ->where('product_models.id', '=', $id)
        //     ->leftjoin(
        //         'product_collection_models',
        //         'product_models.product_collection',
        //         '=',
        //         'product_collection_models.id'
        //     )
        //     ->leftjoin(
        //         'product_type_models',
        //         'product_models.product_type',
        //         '=',
        //         'product_type_models.id'
        //     )
        //     ->leftjoin(
        //         'product_form_models',
        //         'product_models.product_form',
        //         '=',
        //         'product_form_models.id'
        //     )
        //     ->leftjoin(
        //         'product_package_models',
        //         'product_models.product_package',
        //         '=',
        //         'product_package_models.id'
        //     )

        //     ->select(
        //         'product_models.*',
        //         'product_collection_models.product_collection_name',
        //         'product_type_models.product_type_name',
        //         'product_form_models.product_form_name',
        //         'product_package_models.product_package_name'
        //     )
        //     ->get();


        for ($p = 0; $p < count($product_models_res); $p++) {
            $prdct = $product_models_res[$p];
            $aciditydesc = explode("/", $product_models_res[$p]->product_aciditydesc);
            $bodydesc = explode("/", $product_models_res[$p]->product_bodydesc);
            $prdct->acidity_desc = $aciditydesc[0];
            $prdct->body_desc = $bodydesc[0];

            if (!empty($prdct->fileimages)) {
                $prdct->images = json_decode($product_models_res[$p]->fileimages);
            } else {
                $prdct->images = null;
            }


            if (!empty($prdct->disc_event)) {
                $prdct->product_price_after_disc =   ($prdct->product_price) - (($prdct->product_price) * ($prdct->disc_event) / 100);
            } else {
                $prdct->product_price_after_disc =  $prdct->product_price;
            }

            array_push($product_models_array, $prdct);
        }

        $product_models = $product_models_array[0];;
        //dd($product_models);
        // return view('posts.index', compact('posts'));
        $title = 'test';
        $pages = 'detail';
        return view('front/detail-coffee', compact('product_models', 'title', 'pages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_collection_models =  DB::table('product_collection_models')->get();
        $product_type_models =  DB::table('product_type_models')->get();
        $product_form_models =  DB::table('product_form_models')->get();
        $product_package_models =  DB::table('product_package_models')->get();

        $product_models = Product_model::findOrFail($id);
        $images = json_decode($product_models->fileimages);
        //dd($images);
        return view('products.edit', compact(
            'product_models',
            'product_collection_models',
            'product_type_models',
            'product_form_models',
            'product_package_models',
            'images'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd('test');
        $this->validate($request, [
            'product_name' => 'required'
        ]);


        $product_models = Product_model::findOrFail($id);

        $files = [];

        if ($request->hasfile('filenames')) {
            foreach ($request->file('filenames') as $file) {
                //dd($file->getClientOriginalName());
                $name = $file->getClientOriginalName();
                $file->move(public_path('files/product-images'), $name);
                $files[] = $name;
            }
            //dd($files);

            $product_models->update([
                'sku' => $request->sku,
                'product_name' => $request->product_name,
                'product_detail' => $request->product_detail,
                'product_shortdetail' => $request->product_shortdetail,
                'product_brand' => $request->product_brand,
                'product_collection' => $request->product_collection,
                'product_type' => $request->product_type,
                'product_form' => $request->product_form,
                'product_package' => $request->product_package,
                'product_price' => $request->product_price,
                'product_price_currency' => $request->product_price_currency,
                'product_weight' => $request->product_weight,
                'product_width' => $request->product_width,
                'product_height' => $request->product_height,
                'product_length' => $request->product_length,
                'product_acidityscore' => $request->product_acidityscore,
                'product_aciditydesc' => $request->product_aciditydesc,
                'product_bodyscore' => $request->product_bodyscore,
                'product_bodydesc' => $request->product_bodydesc,
                'product_roastdesc' => $request->product_roastdesc,
                'product_typedesc' => $request->product_typedesc,
                'product_intensity' => $request->product_intensity,
                'fileimages' => $files,
                'status_stock' => $request->status_stock,
                'status' => $request->status
            ]);
        } else {

            dd($files);

            $product_models->update([
                'sku' => $request->sku,
                'product_name' => $request->product_name,
                'product_detail' => $request->product_detail,
                'product_shortdetail' => $request->product_shortdetail,
                'product_brand' => $request->product_brand,
                'product_collection' => $request->product_collection,
                'product_type' => $request->product_type,
                'product_form' => $request->product_form,
                'product_package' => $request->product_package,
                'product_price' => $request->product_price,
                'product_price_currency' => $request->product_price_currency,
                'product_weight' => $request->product_weight,
                'product_width' => $request->product_width,
                'product_height' => $request->product_height,
                'product_length' => $request->product_length,
                'product_acidityscore' => $request->product_acidityscore,
                'product_aciditydesc' => $request->product_aciditydesc,
                'product_bodyscore' => $request->product_bodyscore,
                'product_bodydesc' => $request->product_bodydesc,
                'product_roastdesc' => $request->product_roastdesc,
                'product_typedesc' => $request->product_typedesc,
                'product_intensity' => $request->product_intensity,
                'status_stock' => $request->status_stock,
                'status' => $request->status
            ]);
        }

        // if ($request->hasfile('filenames')) {
        //     foreach ($request->file('filenames') as $file) {
        //         $name = time() . rand(1, 100) . '.' . $file->extension();
        //         $file->move(public_path('files/product-images'), $name);
        //         $files[] = $name;
        //     }
        // }



        if ($product_models) {
            return redirect()
                ->route('products.index')
                ->with([
                    'success' => 'Post has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product_models = Product_model::findOrFail($id);

        $product_models->update([
            'deleted' => 'true',
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Product Types deleted successfully');
    }
}
