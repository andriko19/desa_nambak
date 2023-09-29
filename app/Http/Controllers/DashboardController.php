<?php
/**
 * author : Suryo Atmojo <suryoatm@gmail.com>
 * project : Supresso Laravel
 * Start-date : 19-09-2022
 */

namespace App\Http\Controllers;

use App\Charts\SampleChart;

use App\Models\Order_model;
use App\Models\Order_detail_model;
use App\Models\Product_model;
use App\Models\Product_collection_model;
use App\Models\Product_type_model;
use App\Models\Product_form_model;
use App\Models\Product_package_model;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {   
        // Tentang desa
        $TentangDesaByMoto = DB::table('tbl_tentang_desa')->where('jenis', 'Moto')->orderBy('id', 'DESC')->get();
        // Galeri
        $Galeri = DB::table('tbl_galeri')->orderBy('id', 'DESC')->get();
        // Testimoni
        $Testimoni = DB::table('tbl_testimoni')->orderBy('id', 'DESC')->get();
        // Berita
        $Berita = DB::table('tbl_berita')->orderBy('id', 'DESC')->get();
        // data dan informasi
        $dataDanInformasi = DB::table('tbl_data_dan_informasi')->orderBy('id', 'DESC')->get();
        // Form
        $Form = DB::table('tbl_form')->orderBy('id', 'DESC')->get();


        return view('dashboard.index', compact('TentangDesaByMoto', 'Galeri', 'Testimoni', 'Berita', 'dataDanInformasi', 'Form'));
    }
}
