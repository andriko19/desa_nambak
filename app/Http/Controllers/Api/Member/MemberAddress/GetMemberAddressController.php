<?php

namespace App\Http\Controllers\Api\Member\MemberAddress;

use App\Models\Member_address_model;
use App\Http\Resources\MemberAddressResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GetMemberAddressController extends Controller
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

    public function get(Request $request)
    {


        $idmembers =  $request->idmembers;
        $response =  DB::select('select * from member_address_models where idmembers = ' . $idmembers . ' and deleted = "false"');

        return $response;
    }
}