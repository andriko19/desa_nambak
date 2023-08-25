<?php

namespace App\Http\Controllers\Api\Vouchers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GetVouchersController extends Controller
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

    public function getAll()
    {
        $vouchers = [];
        $response =  DB::select('select * from vouchers_models where jenis_voucher = "redeem" and waktustart <= CURRENT_DATE() and waktuend >=CURRENT_DATE() order by id desc');

        for ($v = 0; $v < count($response); $v++) {
            $vrch = $response[$v];

            array_push($vouchers, $vrch);
        }

        // dd($merchandise);
        return $vouchers;
    }

    public function getByFilter(Request $request)
    {

        $response =  DB::select('select * from merchandise_product_models');
        return $response;
    }
}