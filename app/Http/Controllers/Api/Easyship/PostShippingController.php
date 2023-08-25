<?php

namespace App\Http\Controllers\Api\Easyship;

use App\Models\Member_address_model;
use App\Http\Resources\MemberAddressResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client as GuzzleClient;
use App\Http\Controllers\Vend\VendController;

class PostShippingController extends Controller
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

    public function post(Request $request)
    {
        $negara = $request->negara;
        $city = $request->city;
        $provinsi = $request->provinsi;
        $idorder = $request->idorder;
        $kuririd = $request->kuririd;
        $kta = $request->kta;
        $postcode = $request->postcode;
        $prv = $request->prv;
        $namalengkap = $request->namalengkap;
        $alamat = $request->alamat;
        $alamat2 = $request->alamat2;
        $phone = $request->phone;
        $email = $request->email;
        $beratnya = $request->beratnya;
        //$item = $request->item;
        $item =  "{\"description\": \"'" . "lemper" . "'\",\"sku\": \"sku\",\"actual_weight\": " . "2000" . ",\"height\": 5,\"width\": 15,\"length\": 15,\"category\": \"Dry Food & Supplements\",\"declared_currency\": \"SGD\",\"declared_customs_value\": " . "2000" . ",\"quantity\": " . "5" . "}," . "\r\n";
        $item =  $item . "{\"description\": \"'" . "arem-arem" . "'\",\"sku\": \"sku\",\"actual_weight\": " . "4000" . ",\"height\": 5,\"width\": 15,\"length\": 15,\"category\": \"Dry Food & Supplements\",\"declared_currency\": \"SGD\",\"declared_customs_value\": " . "2000" . ",\"quantity\": " . "5" . "}" . "\r\n";
        //$test  = json_decode($item, true);
        // dump($item);
        // dd("test");
        // $item =  "{\"description\": \"'" . $arraykart[0]["namaproduk"] . "'\",\"sku\": \"sku\",\"actual_weight\": " . $berateasyshipp . ",\"height\": 5,\"width\": 15,\"length\": 15,\"category\": \"$categoryship\",\"declared_currency\": \"SGD\",\"declared_customs_value\": " . $arraykart[0]["harga"] . ",\"quantity\": " . $qity . "}" . "\r\n";

        $negara = "sg";
        $city = "surabaya";
        $provinsi = "Jawa timur";

        $ngr = strtoupper($negara);
        $kta = strtoupper($city);
        $prv = strtoupper($provinsi);

        // dump($idorder);
        // dump($kuririd);
        // dump($ngr);
        // dump($kta);
        // dump($postcode);
        // dump($prv);
        // dump($namalengkap);
        // dump($alamat);
        // dump($alamat2);
        // dump($phone);
        // dump($email);
        // dump($beratnya);
        // dump($item);
        // dd("post shipping easy shipp");

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.easyship.com/shipment/v1/shipments");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_POST, TRUE);

        curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"platform_name\": \"Supresso Shop\",
  \"platform_order_number\": \"$idorder\",
  \"selected_courier_id\": \"$kuririd\",
  \"destination_country_alpha2\": \"$ngr\",
  \"destination_city\": \"$kta\",
  \"destination_postal_code\": \"$postcode\",
  \"destination_state\": \"$prv\",
  \"destination_name\": \"$namalengkap\",
  \"destination_address_line_1\": \"$alamat\",
  \"destination_address_line_2\": \"$alamat2\",
  \"destination_phone_number\": \"$phone\",
  \"destination_email_address\": \"$email\",
  \"total_actual_weight\": \"$beratnya\",
  \"items\": [
  $item
  ]
}");

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "Authorization: Bearer prod_bbzjPNveJC+gSLXI24f+oVEMMmyzO+LW2OWokIBqPhw="
        ));

        $response = curl_exec($ch);
        dump($response);
        curl_close($ch);
    }


    public function postshipping($idorder,$kuririd,$negara,$city,$postcode,$provinsi,$namalengkap,$alamat,$alamat2,$phone,$email,$beratnya,$barang)
    {

        //$negara = $request->negara;
        //$city = $request->city;
        //$provinsi = $request->provinsi;
        //$idorder = $request->idorder;
        //$kuririd = $request->kuririd;
        //$kta = $request->kta;
        //$postcode = $request->postcode;
        //$prv = $request->prv;
        //$namalengkap = $request->namalengkap;
        //$alamat = $request->alamat;
        //$alamat2 = $request->alamat2;
        //$phone = $request->phone;
        //$email = $request->email;
        //$beratnya = $request->beratnya;

        // $item = $request->item;
        $categoryship = "Dry Food & Supplements";
// return "test easyship";
//         foreach ($item as $items) {
//    $barang =  "{\"description\": \"'" . $items->name . "'\",\"sku\": \"sku\",\"actual_weight\": " . $items->attributes->gramature . ",\"height\": 5,\"width\": 15,\"length\": 15,\"category\": \"$categoryship\",\"declared_currency\": \"SGD\",\"declared_customs_value\": " . $items->attributes->price  . ",\"quantity\": " . $items->quantity . "}," . "\r\n";

// }

// return $barang;

        //$item =  "{\"description\": \"'" . "kucing" . "'\",\"sku\": \"sku\",\"actual_weight\": " . "2000" . ",\"height\": 5,\"width\": 15,\"length\": 15,\"category\": \"Dry Food & Supplements\",\"declared_currency\": \"SGD\",\"declared_customs_value\": " . "2000" . ",\"quantity\": " . "5" . "}," . "\r\n";
        //$item =  $item . "{\"description\": \"'" . "meong" . "'\",\"sku\": \"sku\",\"actual_weight\": " . "4000" . ",\"height\": 5,\"width\": 15,\"length\": 15,\"category\": \"Dry Food & Supplements\",\"declared_currency\": \"SGD\",\"declared_customs_value\": " . "2000" . ",\"quantity\": " . "5" . "}" . "\r\n";
        // $test  = json_decode($barang, true);
        $item  = $barang;
        // dump($item);
        // dd("test");
        // $item =  "{\"description\": \"'" . $arraykart[0]["namaproduk"] . "'\",\"sku\": \"sku\",\"actual_weight\": " . $berateasyshipp . ",\"height\": 5,\"width\": 15,\"length\": 15,\"category\": \"$categoryship\",\"declared_currency\": \"SGD\",\"declared_customs_value\": " . $arraykart[0]["harga"] . ",\"quantity\": " . $qity . "}" . "\r\n";

        // $negara = "sg";
        // $city = "surabaya";
        // $provinsi = "Jawa timur";

        $ngr = strtoupper($negara);
        $kta = strtoupper($city);
        $prv = strtoupper($provinsi);

        // dump($idorder);
        // dump($kuririd);
        // dump($ngr);
        // dump($kta);
        // dump($postcode);
        // dump($prv);
        // dump($namalengkap);
        // dump($alamat);
        // dump($alamat2);
        // dump($phone);
        // dump($email);
        // dump($beratnya);
        // dump($item);
        // dd("post shipping easy shipp");

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.easyship.com/shipment/v1/shipments");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_POST, TRUE);

        curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"platform_name\": \"Supresso Shop\",
  \"platform_order_number\": \"$idorder\",
  \"selected_courier_id\": \"$kuririd\",
  \"destination_country_alpha2\": \"$ngr\",
  \"destination_city\": \"$kta\",
  \"destination_postal_code\": \"$postcode\",
  \"destination_state\": \"$prv\",
  \"destination_name\": \"$namalengkap\",
  \"destination_address_line_1\": \"$alamat\",
  \"destination_address_line_2\": \"$alamat2\",
  \"destination_phone_number\": \"$phone\",
  \"destination_email_address\": \"$email\",
  \"total_actual_weight\": \"$beratnya\",
  \"items\": [
  $item
  ]
}");

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "Authorization: Bearer prod_bbzjPNveJC+gSLXI24f+oVEMMmyzO+LW2OWokIBqPhw="
        ));

        $response = curl_exec($ch);
        //dump($response);
        curl_close($ch);

        return $response;
    }
}
