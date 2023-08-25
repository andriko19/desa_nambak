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

class UpdateMemberAddressController extends Controller
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

    public function update(Request $request)
    {
        // dd($request->id);

        //set validation
        // $validator = Validator::make($request->all(), [
        //     'id'   => $request->id
        // ]);

        //response error validation
        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), 400);
        // }
        $modelmemberaddress = Member_address_model::find($request->id);

        // dd($modelmemberaddress);
        //update to database
        $modelmemberaddress->update([
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
            // 'status' => $request->status,
            // 'deleted' => $request->deleted,
        ]);

        return new MemberAddressResource($modelmemberaddress);



        // $modelmemberaddress = Member_address_model::create([
        //     'idmembers' => $request->idmembers,
        //     'subject' => $request->subject,
        //     'recepient' => $request->recepient,
        //     'phone' => $request->phone,
        //     'email' => $request->email,
        //     'country' => $request->country,
        //     'province' => $request->province,
        //     'city' => $request->city,
        //     'post_code' => $request->post_code,
        //     'address1' => $request->address1,
        //     'address2' => $request->address2,
        //     'status' => $request->status,
        //     'deleted' => $request->deleted,

        // ]);

        // return new MemberAddressResource($modelmemberaddress);

    }
}