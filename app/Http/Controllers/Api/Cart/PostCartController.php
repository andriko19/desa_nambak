<?php

namespace App\Http\Controllers\Api\Cart;

use App\Models\Member_address_model;
use App\Http\Resources\MemberAddressResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PostCartController extends Controller
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

        // $validator = Validator::make($request->all(), [
        //     'id' =>  $request->id,

        // ]);

        //response error validation
        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), 400);
        // }

        //dd("post cart" . $request->id);
        $this->AddItemCart($request->id, 'redeem', 0, 1, 200, '');

        //save to database
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
        //     'deleted' => "false",

        // ]);
        $status = 'success';
        return $status;
    }

    public function AddItemCart($id, $name, $price, $qty, $gramature, $images)
    {
        \Cart::add(
            [
                'id' => $id,
                'name' => $name,
                'price' => $price,
                'quantity' => $qty,
                'attributes' => array(
                    'gramature' => $gramature,
                    'images' => $images,
                )
            ]
        );
    }
}