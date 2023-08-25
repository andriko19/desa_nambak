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

class PostMemberAddressController extends Controller
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

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'idmembers' =>  $request->idmembers,

        ]);

        //response error validation
        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), 400);
        // }

        //save to database
        $modelmemberaddress = Member_address_model::create([
            'idmembers' => $request->idmembers,
            'subject' => $request->subject,
            'recepient' => $request->recepient,
            'phone' => $request->phone,
            'email' => $request->email,
            'country' => $request->country,
            'province' => $request->province,
            'city' => $request->city,
            'post_code' => $request->post_code,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'status' => $request->status,
            'deleted' => "false",

        ]);

        return new MemberAddressResource($modelmemberaddress);
    }
}