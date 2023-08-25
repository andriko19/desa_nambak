<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\Order_model;
use App\Models\Order_detail_model;


use Illuminate\Support\Facades\Validator;
use Stripe\Exception\CardException;
use Stripe\StripeClient;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Stripe\Exception\ApiErrorException;

class FrontCheckoutController extends Controller
{
    private $stripe;
    public function __construct()
    {
        $this->stripe = new StripeClient(config('stripe.api_keys.secret_key'));
    }

    public function index()
    {

        $member = app('App\Http\Controllers\Member\MemberController')->GetMemberInformation();
        //dd($member);
        //check dan get data free gift
        $gift = $this->getFreeGift();
        //## memindahkan isi object gift kedalah variable
        $gift_box_id = "GIFT-" . $gift->gift_box_id;
        $gift_box_images =  $gift->gift_box_images;
        // $gift_box_gramature = $gift->product_weight;

        //## memindahkan isi object gift kedalah variable untuk di munculkan di blade
        $product_free_gift_models = $gift;
        //## memberikan nilai awalan status free gift false untuk memunculkan tulisan promo pada blade
        $statusfreegift = "false";
        //get data cart
        $cartItem = \Cart::getContent();
        $cartItems = $cartItem->sort();

       
        // if(\Cart::getCondition('coupon')==null)
        // {
        //     $cartDiscount = 0;
        // }
        // else
        //     {
        //         $cartDiscount = ((\Cart::getCondition('coupon'))->getValue()) * -1;
        //       }
            //   dd( $cartDiscount);
// (((\Cart::getCondition('coupon'))->getValue()));
// foreach ($cartItem as $item) {
//  dd($cartItems);
// }

        $totalweight = 0;
        foreach ($cartItems as $item) {
            $totalweight =
                $totalweight + ($item->attributes->gramature);
        }
        // dd($totalweight);

        if (empty($cartItems[$gift_box_id])) {
            $statusfreegift = "false";
        } else {
            $statusfreegift = "true";
        }

        $title = "Shipping & Checkout";
        $pages = "checkout";
        $shipping = \Cart::getCondition('Shipping');
        $arraynegara = $this->getCountries();
        return view('front/checkout', compact('member', 'cartItems', 'title', 'pages', 'statusfreegift', 'product_free_gift_models', 'gift_box_images', 'shipping', 'arraynegara', 'totalweight'));
    }

    public function AddShipping(Request $request)
    {
        //dd("test");
        \Cart::clearCartConditions();
        $shipping = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'Shipping',
            'type' => 'shipping',
            'target' => 'total', // this condition will be applied to cart's subtotal when getSubTotal() is called.
            'value' => '+3.5',
            'order' => 1
        ));

        \Cart::condition($shipping);

        session()->flash('success', 'Item Cart is Updated Successfully !');
        return redirect()->route('checkout.index');
    }

    public function getFreeGift()
    {
        $product_free_gift_models_res =  DB::select('select fg.product_id,
            fg.minimum_order,
            fg.status as status_gift,
            pm.*, pcm.product_collection_name, ptm.product_type_name,
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
            from product_free_gift_models as fg 
            LEFT JOIN product_models as pm on pm.id = fg.product_id
            LEFT JOIN product_collection_models as pcm on pcm.id = pm.product_collection
            LEFT JOIN product_type_models as ptm on ptm.id = pm.product_collection
            LEFT JOIN product_form_models as pfm on pfm.id = pm.product_collection
            LEFT JOIN product_package_models as ppm on ppm.id = pm.product_collection
						where fg.status ="active"');

        $gift = [];
        $gft = $product_free_gift_models_res[0];
        $gft->gift_box_id = ($product_free_gift_models_res[0]->product_id);
        $gft->gift_box_name = ($product_free_gift_models_res[0]->product_name);
        $gft->gift_box_minimum_order = ($product_free_gift_models_res[0]->minimum_order);
        $gft->gift_box_real_price = ($product_free_gift_models_res[0]->product_price);
        $gft->min_gift_box_real_price = $gft->gift_box_real_price * -1;

        if (!empty($product_free_gift_models_res[0]->fileimages)) {
            $gft->gift_box_images = (json_decode($product_free_gift_models_res[0]->fileimages))[0];
        } else {
            $gft->gift_box_images = null;
        }

        array_push($gift, $gft);
        return $gift[0];
    }


    public function getCountries()
    {
        $countries_res =  DB::select('select * from countries');
        return
            $countries_res;
    }

    public function getShippingVendor()
    {
        $ch = curl_init();

        curl_setopt(
            $ch,
            CURLOPT_URL,
            "https://api.easyship.com/rate/v1/rates"
        );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_POST, TRUE);

        curl_setopt($ch, CURLOPT_POSTFIELDS, "{
            \"origin_country_alpha2\": \"sg\",
            \"origin_postal_code\": \"238897\",
            \"destination_country_alpha2\": \"al\",
            \"destination_postal_code\": \"1\",
            \"taxes_duties_paid_by\": \"Sender\",
            \"is_insured\": false,
            \"items\": [
                {
                \"actual_weight\": 20,
                \"height\": 30,
                \"width\": 30,
                \"length\": 30,
                \"category\": \"Dry Food & Supplements\",
                \"declared_currency\": \"SGD\",
                \"declared_customs_value\": 10
                }
            ]
            }");

        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                "Content-Type: application/json",
                "Authorization: Bearer prod_bbzjPNveJC+gSLXI24f+oVEMMmyzO+LW2OWokIBqPhw="
            )
        );

        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);

        return $data;
    }

    public function indexshipping()
    {

        // dd("indexshipping");
        //       +"id": 4
        // +"name": "Afghanistan"
        // +"alpha_2": "af"
        // +"alpha_3": "afg

        $cartItem = \Cart::getContent();
        $cartItems = $cartItem->sort();

        //return $cartItems; 

        $totalweight = 0;
        foreach ($cartItems as $item) {
            $totalweight =
                $totalweight + (($item->attributes->gramature)*($item->quantity));
        }



        $kodenegara = $_POST['state'];
        $postcode = $_POST['postcode'];
        $iduser = $_POST['iduser'];
        $city = $_POST['city'];
        $alamat = $_POST['alamat'];
        $namanegara = $_POST['namanegara'];

        //$totalweight = 6000;

        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Ymd');
        $jamship = date('His');
        $jumlahberat = ($totalweight / 1000);

        //return ($jumlahberat);

        if ($jumlahberat > 1) {
            $volumtiga = 75;
        } else {
            $volumtiga = 30;
        }
        if ($kodenegara == 'es') {
            $categoryship = 'Dry Food & Supplements';
        } else {
            $categoryship = 'Dry Food & Supplements';
        }

        if (!empty($kodenegara)) {
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://api.easyship.com/rate/v1/rates");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "{
            \"origin_country_alpha2\": \"sg\",
            \"origin_postal_code\": \"238897\",
            \"destination_country_alpha2\": \"$kodenegara\",
            \"destination_postal_code\": \"$postcode\",
            \"taxes_duties_paid_by\": \"Sender\",
            \"is_insured\": false,
            \"items\": [
                {
                \"actual_weight\": $jumlahberat,
                \"sku\": \"test\",
                \"height\": 30,
                \"width\": 30,
                \"length\": $volumtiga,
                \"category\": \"$categoryship\",
                \"declared_currency\": \"SGD\",
                \"declared_customs_value\": 10
                }
            ]
            }");

            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Content-Type: application/json",
                "Authorization: Bearer prod_bbzjPNveJC+gSLXI24f+oVEMMmyzO+LW2OWokIBqPhw="
            ));


            $response = curl_exec($ch);
            curl_close($ch);
            //var_dump(json_decode($response, true));
            $data = json_decode($response, true);

            return $data;
            echo '<br>';
            echo '<br>';
            echo count($data['rates']);
            //dd($data);

            $radio = '';
            // if ($kodenegara == 'sg' || $kodenegara == 'SG') {
            //     //dd("negara singapura");
            //     if ($jamship >= "000100" && $jamship <= "120000") {
            //         $radio = $radio . '<br>';
            //         $radio = $radio . '<div>';
            //         $radio = $radio . '<input type="radio" id="shipping0" name="shipping" value="3.50//Supresso Domestic/" style="margin-top:15px;" required>';
            //         $radio = $radio . '<label style="vertical-align:middle;" for="shipping0">&nbsp Supresso Domestic</label><br>';
            //         $radio = $radio . '</div>';
            //         $radio = $radio . "Estimated Shipping: 2 - 3 Working days";
            //         $radio = $radio . '<br>';
            //         $radio = $radio . "Price : $ 3.50";
            //         $radio = $radio . '<br>';
            //         $radio = $radio . '<br>';
            //     } else {
            //         $radio = $radio . '<br>';
            //         $radio = $radio . '<div>';
            //         $radio = $radio . '<input type="radio" id="shipping0" name="shipping" value="3.50//Supresso Domestic/" style="margin-top:15px;" required>';
            //         $radio = $radio . '<label style="vertical-align:middle;" for="shipping0">&nbsp Supresso Domestic</label><br>';
            //         $radio = $radio . '</div>';
            //         $radio = $radio . "Estimated Shipping: 2 - 3 Working days";
            //         $radio = $radio . '<br>';
            //         $radio = $radio . "Price : $ 3.50";
            //         $radio = $radio . '<br>';
            //         $radio = $radio . '<br>';
            //     }
            //     return $radio;
            // } 
            // else 
            {
                //dd("bukan negara singapura");
                if (count($data['rates']) > 5) {
                    $ulang = 5;
                } elseif (count($data['rates']) > 3) {
                    $ulang = 3;
                } else {
                    $ulang = count($data['rates']);
                }

                //for($x = 0; $x < count($data['rates']); $x++){
                for ($x = 0; $x < $ulang; $x++) {

                    $harga = $data['rates'][$x]['total_charge'];

                    $ambilpriceid = 'SELECT * FROM shippingstripe WHERE harga = "' . $harga . '"';
                    $hasilpriceid = mysqli_query($conn, $ambilpriceid);
                    $rowresultpriceid = mysqli_fetch_array($hasilpriceid, MYSQLI_ASSOC);

                    $stimasi = $data['rates'][$x]['min_delivery_time'];
                    $estimasi = $data['rates'][$x]['max_delivery_time'];

                    $stimasi = $stimasi + 1;
                    $estimasi = $estimasi + 1;

                    if ($stimasi == 1) {
                        $har = " day";
                    } else {
                        $har = " days";
                    }

                    if ($estimasi == 1) {
                        $harr = " day";
                    } else {
                        $harr = " days";
                    }
                    $kurir = $data['rates'][$x]['courier_name'];
                    $hargashipnya = $data['rates'][$x]['total_charge'];
                    if (
                        $kurir == "Ninja Van - Express"
                    ) {
                        $hargashipnya = $hargashipnya + 5;
                    }
                    if (
                        $kurir == "DHL eCommerce - Packet International" || $kurir == "DHL eCommerce - Packet Plus" || $kurir == "DHL eCommerce - Packet International Direct" || $kurir == "DHL eCommerce - Parcel Direct US"
                    ) {
                        $hargashipnya = $hargashipnya + 4;
                    }

                    $idprice = $rowresultpriceid['priceidshipping'];

                    $kuririd = $data['rates'][$x]['courier_id'];
                    echo '<br>';

                    echo '<input type="radio" id="shipping' . $x . '" name="shipping" value="' . $hargashipnya . '/' . $idprice . '/' . $kurir . '/' . $kuririd . '" required>';
                    echo '<label for="shipping' . $x . '">&nbsp' . $data['rates'][$x]['courier_name'] . ' </label><br>';
                    if ($data['rates'][$x]['max_delivery_time'] == '1') {
                        echo "Estimated Shipping: " . $stimasi . $har;
                    } else {
                        echo "Estimated Shipping: " . $stimasi . $har . " - " . $estimasi . $harr;
                    }
                    echo '<br>';
                    echo "Price : " . "$" . $hargashipnya;

                    echo '<br>';
                }
            }
        } 
        else 
        {
        }
    }

    public function paymentstripe(Request $request)
    {
        dd("FrontCheckoutController@paymentstripe");

        
    }

    public function paymentpaypal(Request $request)
    {
        dd("FrontCheckoutController@paymentpaypal");
    }













    private function createCheckoutSession($totalamount)
    {

        ##old_supresso==========================================
        /* 
$checkout_session = \Stripe\Checkout\Session::create([
	'success_url' => $domain_url . '/success',
	'cancel_url' => $domain_url . '/canceled',
	'payment_method_types' => ['card'],
	'mode' => 'payment',
	//'allow_promotion_codes' => true,
	'line_items' => [['price_data' => ['currency' => 'sgd','product_data' => ['name' => 'Supresso Coffee',],'unit_amount' => $totalamount,],'quantity' => 1,]], 
  ]);

  */
        ##======================================================

        // $stripe = new \Stripe\StripeClient(
        //     'sk_test_4eC39HqLyjWDarjtT1zdp7dc'
        //   );
        $this->stripe->checkout->sessions->create([
            //     'success_url' => 'https://example.com/success',
            //     'cancel_url' => 'https://example.com/cancel',
            //     'line_items' => [
            //       [
            //         'price' => 'price_H5ggYwtDq4fbrJ',
            //         'quantity' => 2,
            //       ],
            //     ],
            //     'mode' => 'payment',
            //   ]);
            'success_url' => 'https://example.com/success',
            'cancel_url' => 'https://example.com/cancel',
            'customer_email'       => 'webdevtest@gmail.com',
            'client_reference_id'  => '1234',
            'payment_method_types' => ['card'],
            'mode' => 'payment',
            //'allow_promotion_codes' => true,
            'line_items' => [
                [
                    'price_data' =>
                    [
                        'currency' => 'sgd', 
                        'product_data' => ['name' => 'Supresso Coffee',], 
                        'unit_amount' => $totalamount,
                    ],
                    'quantity' => 1,
                ]
            ],
        ]);

      
    }

    public function createSession(Request $request)
    {
        $session = $this->stripe->checkout->sessions->create([
            'success_url' => 'https://example.com/success',
            'cancel_url' => 'https://example.com/cancel',
            'customer_email'       => 'webdevtest@gmail.com',
            'client_reference_id'  => '1234',
            'payment_method_types' => ['card'],
            'mode' => 'payment',
            'line_items' => [
                [
                    'price_data' =>
                    [
                        'currency' => 'sgd', 
                        'product_data' => ['name' => 'Supresso Coffee',], 
                        'unit_amount' => 45000,
                    ],
                    'quantity' => 1,
                ]
            ],
        ]);
      

        if ($session) {
            $res = response()->json(
                [
                    'status' => 'success',
                    'sessionId' => $session->id,

                ],
                200
            );
        } else {
            $res = response()->json(
                [
                    'status' => 'failed',
                    'sessionId' => $session->id,
                ],
                500
            );
        };
        return $res;
       
    }

    ##create token for stripe
    private function createToken($cardData)
    {
        $token = null;
        try {
            $token = $this->stripe->tokens->create([
                'card' => [
                    'number' => $cardData['cardNumber'],
                    'exp_month' => $cardData['month'],
                    'exp_year' => $cardData['year'],
                    'cvc' => $cardData['cvv']
                ]
            ]);
        } catch (CardException $e) {
            $token['error'] = $e->getError()->message;
        } catch (Exception $e) {
            $token['error'] = $e->getMessage();
        }
        return $token;
    }
    ##create charge for stripe
    private function createCharge($tokenId, $amount)
    {
        $charge = null;
        try {
            $charge = $this->stripe->charges->create([
                'amount' => $amount,
                'currency' => 'usd',
                'source' => $tokenId,
                'description' => 'dev indraco test payment',
                // 'customer' => 'webdevindraco@gmail.com'
            ]);
        } catch (Exception $e) {
            $charge['error'] = $e->getMessage();
        }
        return $charge;
    }



















    public function payment(Request $request)
    {
        // dump("ini payment");
        // dump("cfullname = " . $request->cfullname);
        // dump("cemail = " . $request->cemail);
        // dump("cphone = " . $request->cphone);
        // dump("cshippingto = " . $request->cshippingto);
        // dump("crecepientsFullName = " . $request->crecepientsFullName);
        // dump("crecepientsEmail = " . $request->crecepientsEmail);
        // dump("crecepientsPhone = " . $request->crecepientsPhone);
        // dump("crecepientsState = " . $request->crecepientsState);
        // dump("crecepientsProvince = " . $request->crecepientsProvince);
        // dump("crecepientsCity = " . $request->crecepientsCity);
        // dump("cpostcode = " . $request->cpostcode);
        // dump("caddress1 = " . $request->caddress1);
        // dump("caddress2 = " . $request->caddress2);
        // dump("cmessage = " . $request->cmessage);
        // dump("cpayment = " . $request->cpayment);
        // dump("cnotifikasiNews = " . $request->cnotifikasiNews);
        // dump("cnotifikasiTnc = " . $request->cnotifikasiTnc);
        // dump("cShipperName = " . $request->cShipperName);
        // dump("cShippingPrice = " . $request->cShippingPrice);
        // dump("total = " . $request->total);
        $total = ((\Cart::getTotal()));
        // dump($total);


        $session = $this->stripe->checkout->sessions->create([
            'success_url' => 'https://example.com/success',
            'cancel_url' => 'https://example.com/cancel',
            'customer_email'       => $request->cemail,
            'client_reference_id'  => '1234',
            'payment_method_types' => ['card'],
            'mode' => 'payment',
            'line_items' => [
                [
                    'price_data' =>
                    [
                        'currency' => 'sgd', 
                        'product_data' => ['name' => 'Supresso Coffee',], 
                        'unit_amount' => 45000,
                    ],
                    'quantity' => 1,
                ]
            ],
        ]);
      

        if ($session) {
            $res = response()->json(
                [
                    'status' => 'success',
                    'sessionId' => $session->id,

                ],
                200
            );
        } else {
            $res = response()->json(
                [
                    'status' => 'failed',
                    'sessionId' => $session->id,
                ],
                500
            );
        };
        return $res;











        

        // dd("ini FrontCheckoutController@payment");

        // $cfullname = $request->cfullname;
        // $cemail = $request->cemail;
        // $cphone = $request->cphone;
        // $cshippingto = $request->cshippingto;
        // $crecepientsFullName = $request->crecepientsFullName;
        // $crecepientsEmail = $request->crecepientsEmail;
        // $crecepientsPhone = $request->crecepientsPhone;
        // $crecepientsState = $request->crecepientsState;
        // $crecepientsProvince = $request->crecepientsProvince;
        // $crecepientsCity = $request->crecepientsCity;
        // $cpostcode = $request->cpostcode;
        // $caddress1 = $request->caddress1;
        // $caddress2 = $request->caddress2;
        // $cmessage = $request->cmessage;
        // $cpayment = $request->cpayment;
        // $cnotifikasiNews = $request->cnotifikasiNews;
        // $cnotifikasiTnc = $request->cnotifikasiTnc;
        // $cShipperName = $request->cShipperName;
        // $cShippingPrice = $request->cShippingPrice;

        // $condition = new \Darryldecode\Cart\CartCondition(array(
        //     'name' => $request->cShipperName,
        //     'type' => 'shipping',
        //     'target' => 'total', // this condition will be applied to cart's total when getTotal() is called.
        //     'value' => '+' . $request->cShippingPrice,
        //     'order' => 1 // the order of calculation of cart base conditions. The bigger the later to be applied.
        // ));
        // \Cart::condition($condition);

        // $cartSubTotal = \Cart::getSubTotal();
        // $totalbeforediscount = session('totalbeforediscount');

        // dump("totalbeforediscount = " . $totalbeforediscount);
        // dump("SubTotal = " . $cartSubTotal);

        // dump(\Cart::getContent());
        // dump(\Cart::getConditions());

        // $cartDiscount = ((\Cart::getCondition('coupon'))->getValue()) * -1;
        // dump($cartDiscount);
        // $cartTotal = \Cart::getTotal();

        // dump("Total = " . $cartTotal);
        // //==============================================================================================================================================================================
        // // $this->validate($request, [
        // //     'product_name' => 'required'
        // // ]);

        // // $files = [];
        // // if ($request->hasfile('filenames')) {
        // //     foreach ($request->file('filenames') as $file) {
        // //         $name = time() . rand(1, 100) . '.' . $file->extension();
        // //         $file->move(public_path('files/product-images'), $name);
        // //         $files[] = $name;
        // //     }
        // // }

        // $OrderNumber = app('App\Http\Controllers\Order\OrderController')->getOrderNumber();
        // $member = app('App\Http\Controllers\Member\MemberController')->GetMemberInformation();
        // date_default_timezone_set('Asia/Jakarta');
        // $date = date('Y-m-d');
        // $time = date("H:i:s");
        // dump($time);

        // $couponDiscount = (session('coupon'));

        // dump($couponDiscount);
        // dd("end payment");

        // $order_models = Order_model::create([
        //     'nomerorder' => $OrderNumber,
        //     'iduser' => $member[0]->id_users_login,
        //     'tanggalorder' => $date,
        //     'jamorder' => $time,
        //     'status' => 'on-hold',
        //     'statustrack' => '-',
        //     'itemsubtotal' => $cartSubTotal,
        //     'discon' => $cartDiscount,

        //     'coupon' => $request->coupon,
        //     'kodekupon' => $request->kodekupon,
        //     'persdiskon' => $request->persdiskon,
        //     'tax' => $request->tax,
        //     'shippingprice' => $request->shippingprice,
        //     'ordertotal' => $request->ordertotal,
        //     'payment' => $request->payment,
        //     'pengiriman' => $request->pengiriman,
        //     'namalengkap' => $request->namalengkap,
        //     'namalengkapawb' => $request->namalengkapawb,
        //     'firtsname' => $request->firtsname,
        //     'lastname' => $request->lastname,
        //     'negara' => $request->negara,
        //     'provinsi' => $request->provinsi,
        //     'kota' => $request->kota,
        //     'kecamatan' => $request->kecamatan,
        //     'alamat' => $request->alamat,
        //     'alamatawb' => $request->alamatawb,
        //     'alamatdua' => $request->alamatdua,
        //     'kodepos' => $request->kodepos,
        //     'company' => $request->company,
        //     'email' => $request->email,
        //     'emailtanpatitik' => $request->emailtanpatitik,
        //     'phone' => $request->phone,
        //     'phoneawb' => $request->phoneawb,
        //     'addcatatan' => $request->addcatatan,
        //     'addcatatanawb' => $request->addcatatanawb,
        //     'statusawb' => $request->statusawb,
        //     'notifnews' => $request->notifnews,
        //     'deleted' => $request->deleted



        // ]);

        // if ($order_models) {
        //     return redirect()
        //         ->route('products.index')
        //         ->with([
        //             'success' => 'New post has been created successfully'
        //         ]);
        // } else {
        //     return redirect()
        //         ->back()
        //         ->withInput()
        //         ->with([
        //             'error' => 'Some problem occurred, please try again'
        //         ]);
        // }


        // dd("end payment");
    }
}