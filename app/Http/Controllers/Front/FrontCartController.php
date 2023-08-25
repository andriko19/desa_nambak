<?php

namespace App\Http\Controllers\Front;


// use App\Models\Product_model;
// use App\Models\Product_collection_model;
// use App\Models\Product_type_model;
// use App\Models\Product_form_model;
// use App\Models\Product_package_model;
// use App\Models\Product_free_gift_model;
// use App\Models\File;
use Illuminate\Http\Request;
use App\Models\Member_redeem_log_model;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;


class FrontCartController extends Controller
{

    public function chooseGift(Request $request)
    {

        #menyimpan id gift box pada session untuk digunakan pada view blade
        Session::put('gift', $request->id);

        $gift_product = $this->getFreeGift();
        $gift = [];
        foreach ($gift_product as $key => $items) {
            $gft = $items;
            $gft->gift_box_id = "GIFT-" . $items->gift_box_id;
            $gft->gift_box_images =  $items->gift_box_images;

            if (!empty($items->fileimages)) {
                $gft->gift_box_images = (json_decode($items->fileimages))[0];
            } else {
                $gft->gift_box_images = null;
            }
            array_push($gift, $gft);
        }

        $cartItems = \Cart::getContent();
        //dd($cartItems);
        $gift_box_id_chosen = $request->id;

        #check apakah gift box sudah pernah dipilih client
        if ($gift_box_id_chosen === 'null') {
            #gift box belum pernah dipilih
            $gift_box_id = $gift_product[0]->gift_box_id;
            $gift_box_images =  $gift_product[0]->gift_box_images;
            $gift_box_name = $gift_product[0]->gift_box_name;
            $gift_box_minimum_order = $gift_product[0]->gift_box_minimum_order;
            $gift_box_real_price = $gift_product[0]->gift_box_real_price;
            $gift_box_images = $gift_product[0]->gift_box_images;
            $product_weight = $gift_product[0]->product_weight;
            $gift_box_gramature = $product_weight;
        } else {
            #gift box sudah pernah dipilih
            $filtered = array();
            $rows = $gift;
            foreach ($rows as $index => $columns) {
                foreach ($columns as $key => $value) {
                    if ($key == 'product_id' && $value ==  $gift_box_id_chosen) {
                        $filtered[] = $columns;
                    }
                }
            }

            $gift_box_id = $filtered[0]->gift_box_id;
            $gift_box_images =  $filtered[0]->gift_box_images;
            $gift_box_name = $filtered[0]->gift_box_name;
            $gift_box_minimum_order = $filtered[0]->gift_box_minimum_order;
            $gift_box_real_price = $filtered[0]->gift_box_real_price;
            $gift_box_images = $filtered[0]->gift_box_images;
            $product_weight = $filtered[0]->product_weight;
            $gift_box_gramature = $product_weight;
        }


        #check condition apakah sub total sudah memungkinkan mendapatkan free gift box
        if (\Cart::getSubTotal() >   $gift_box_minimum_order) {
            $payload = [
                'status1' => "success1",
                'subtotal' => \Cart::getSubTotal(),
                'min order' => $gift_box_minimum_order
            ];

            if (empty($cartItems[$gift_box_id])) {
                $payload = [
                    'status11' => "success11",
                    'subtotal' => \Cart::getSubTotal(),
                    'min order' => $gift_box_minimum_order
                ];
                $this->AddItemCart($gift_box_id, $gift_box_name, 0, 1, $gift_box_gramature, $gift_box_images, "FREEGIFT");
            }
        } else if (\Cart::getSubTotal() <   $gift_box_minimum_order) {
            $payload = [
                'status2' => "success2",
                'subtotal' => \Cart::getSubTotal(),
                'min order' => $gift_box_minimum_order
            ];
            $this->RemoveItemCart($gift_box_id);
        }

        $payload = [
            'status' => "success",
            'id' => Session::get('gift'),
            '$gift_box_id' => $gift_product[0]->gift_box_id,
            '$gift_box_images' => $gift_product[0]->gift_box_images,
            '$gift_box_name' => $gift_product[0]->gift_box_name,
            '$gift_box_minimum_order' => $gift_product[0]->gift_box_minimum_order,
            '$gift_box_real_price' => $gift_product[0]->gift_box_real_price,
            '$gift_box_images' => $gift_product[0]->gift_box_images,
            '$product_weight' => $gift_product[0]->product_weight,
            '$gift_box_gramature' => $product_weight

        ];

        $result = \json_encode($payload);


        return $payload;
    }

    public function cartList(Request $request)
    {
        \Cart::clearCartConditions();
        session(['totalbeforediscount' => \Cart::getTotal()]);
        // $condition = new \Darryldecode\Cart\CartCondition(array(
        //     'name' => 'coupon',
        //     'type' => 'coupon',
        //     'target' => 'subtotal', // this condition will be applied to cart's total when getTotal() is called.
        //     'value' => '0',
        //     'order' => 1 // the order of calculation of cart base conditions. The bigger the later to be applied.
        // ));
        // $coupon = null;
    

    // \Cart::condition($condition);

    //dd("test");

        $cartItems = \Cart::getContent();
        //\Cart::clear();
        dump($cartItems);
        #ambil session id gift yang dipilih
        $gift_box_id_chosen = Session::get('gift');

        $member = 0;
        try {
            $member = app('App\Http\Controllers\Member\MemberController')->GetMemberInformation();
            $idmembers = ($member[0]->id_users_login);
        } catch (\Throwable $err) {
            $member = session()->getId();
            $idmembers =  $member;
        }

        #check dan get data free gift
        $gift_product = $this->getFreeGift();

        $gift = [];
        foreach ($gift_product as $key => $items) {
            $gft = $items;
            $gft->gift_box_id = "GIFT-" . $items->gift_box_id;
            $gft->gift_box_images =  $items->gift_box_images;

            if (!empty($items->fileimages)) {
                $gft->gift_box_images = (json_decode($items->fileimages))[0];
            } else {
                $gft->gift_box_images = null;
            }

            array_push($gift, $gft);
        }


        #check apakah gift box sudah pernah dipilih client
        if ($gift_box_id_chosen === 'null') {
            #gift box belum pernah dipilih
            $gift_box_id = $gift_product[0]->gift_box_id;
            $gift_box_images =  $gift_product[0]->gift_box_images;
        } else {
            #gift box sudah pernah dipilih
            $filtered = array();

            $rows = $gift;
            foreach ($rows as $index => $columns) {
                foreach ($columns as $key => $value) {
                    if ($key == 'product_id' && $value ==  $gift_box_id_chosen) {
                        $filtered[] = $columns;
                    }
                }
            }
            if ($filtered) {
                $gift_box_id = $filtered[0]->gift_box_id;
                $gift_box_images = $filtered[0]->gift_box_images;
            } else {
                $gift_box_id = $gift_product[0]->gift_box_id;
                $gift_box_images = $gift_product[0]->gift_box_images;
            }
        }

        $minimumbuy = $gift[0]->gift_box_minimum_order;
        $totalbuy = \Cart::getTotal();

        ## memindahkan isi object gift kedalah variable untuk di munculkan di blade
        $product_free_gift_models = $gift;

        ## memberikan nilai awalan status free gift false untuk memunculkan tulisan promo pada blade
        $statusfreegift = "false";
        $statusshowfreegift = "false";
        ## get data cart
        $cartItem = \Cart::getContent();
        $cartItems = $cartItem->sort();

        #atur kondisi modal gift box berdasarkan apakah barang gift sudah ada di cart
        if (empty($cartItems[$gift_box_id])) {
            $statusshowfreegift = "true";
        } else {
            $statusshowfreegift = "false";
        }

        ## atur kondisi modal gift box berdasarkan apakah jumlah total lebih besar dari minimum order
        if ($totalbuy < $minimumbuy) {
            $statusfreegift = "false";
        } else {
            $statusfreegift = "true";
        }

        if (isset($_POST['coupon'])) {
            $coupon = $_POST['coupon'];
        } else {
            $coupon = null;
        }

        if (session('discount') == null) {
            $discount = 0;
            session(['discountvalue' => 0]);
        } else {
            $discount = session('discount');
            session(['discountvalue' => $discount]);
        }

        if (session('coupon') == null) {
            $coupon = 0;
            session(['coupon' => null]);
        } else {
            $coupon = session('coupon');
            // session(['discountvalue' => $discount]);
        }

        if (session('couponid') == null) {
            $couponid = 0;
            session(['couponid' => null]);
        } else {
            $couponid = session('couponid');
            // session(['discountvalue' => $discount]);
        }

        if (session('couponstatus') == null) {
            $couponstatus = 0;
            session(['couponstatus' => null]);
        } else {
            $couponstatus = session('couponstatus');
            // session(['discountvalue' => $discount]);
        }

        $title = "Shopping Cart";
        $pages = "cart";
        return view('front/cart', compact('cartItems', 'title', 'pages', 'statusfreegift', 'statusshowfreegift', 'product_free_gift_models', 'gift_box_images', 'coupon', 'couponid', 'couponstatus', 'discount', 'idmembers'));
    }

    public function updateDiscountCart(Request $request)
    {
        \Cart::clearCartConditions();
        $discount = null;
        $coupon = $request->coupon;

        session(['totalbeforediscount' => \Cart::getTotal()]);
        ## code discount
        if (isset($_POST['resetdiscount'])) {

            if (isset($_POST['coupon'])) {
                $couponcode = $_POST['coupon'];
                dump($couponcode);
            }
            if (isset($_POST['coupon-id'])) {
                $couponid = $_POST['coupon-id'];
                dump($couponid);
            }
            if (isset($_POST['coupon-status'])) {
                $couponstatus = $_POST['coupon-status'];
                dump($couponstatus);
            }



            DB::table('member_vouchers_models')
                ->where('id', $couponid)
                ->update(['status' => 'unused']);

            $conditionName = 'coupon';
            \Cart::removeCartCondition($conditionName);
            $coupon = null;
            session(['unggas' => null]);
        } else if ((isset($_POST['adddiscount']))) {
            $voucher = app('App\Http\Controllers\Vouchers\VouchersController')->getVouchers($coupon);

            if (isset($_POST['coupon'])) {
                $coupon = $_POST['coupon'];
            }
            if (isset($_POST['coupon-id'])) {
                $couponid = $_POST['coupon-id'];
            }
            if (isset($_POST['coupon-status'])) {
                $couponstatus = $_POST['coupon-status'];
            }

            DB::table('member_vouchers_models')
                ->where('id', $couponid)
                ->update(['status' => 'used']);


            if (!empty($voucher[0])) {



                if ($voucher[0]->nominalpersen <> 0) {
                    $value = "-" . $voucher[0]->nominalpersen . "%";
                    $discount = ((\Cart::getTotal()) * ($voucher[0]->nominalpersen / 100));
                } else if ($voucher[0]->nominalbulat <> 0) {
                    $value = "-" . $voucher[0]->nominalbulat;
                    $discount = (($voucher[0]->nominalbulat));
                }


                if ($discount > $voucher[0]->maxdiscount) {
                    $discount = $voucher[0]->maxdiscount;
                    $value = "-" . ($voucher[0]->maxdiscount);
                }

                //dd($discount);
                $condition = new \Darryldecode\Cart\CartCondition(array(
                    'name' => 'coupon',
                    'type' => 'coupon',
                    'target' => 'subtotal', // this condition will be applied to cart's total when getTotal() is called.
                    'value' => $value,
                    'order' => 1 // the order of calculation of cart base conditions. The bigger the later to be applied.
                ));
                // $discount = ((\Cart::getTotal()) * ($voucher[0]->nominalpersen / 100));
            } else {
                $condition = new \Darryldecode\Cart\CartCondition(array(
                    'name' => 'coupon',
                    'type' => 'coupon',
                    'target' => 'subtotal', // this condition will be applied to cart's total when getTotal() is called.
                    'value' => '0',
                    'order' => 1 // the order of calculation of cart base conditions. The bigger the later to be applied.
                ));
                $coupon = null;
            }

            \Cart::condition($condition);
        }
        $descdisc = (object)array(
            "name" => $coupon,
            "discount" => $discount,

        );


        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list', ['coupon' => $coupon, 'couponid' => $couponid, 'couponstatus' => $couponstatus])
            ->with('discount', $discount)
            ->with('coupon', $coupon)
            ->with('couponid', $couponid)
            ->with('couponstatus', $couponstatus);;
    }




    public function addToCart(Request $request)
    {

        $giftset = $request->giftset;

        dump($request->id);
        dump($request->name);
        dump($request->price);
        //dump($qty);
        dump($request->gramature);
        dump($request->images);
        //dd('addtocart');
        //dd("yyyyy");
        $qty = 0;

        if (isset($_POST['addCartContinueShopping'])) {
            $qty = $request->quant[2];
            $redir = 'fproducts.index';
        } else if (isset($_POST['addCartContinueCart'])) {
            $qty = $request->quant[2];
            $redir = 'cart.list';
        } else {
            $qty = $request->quantity;
            $redir = 'fproducts.show';
        }
        if ($giftset == 0) {
            //dd("ini bukan gift set");
            $types = "NORMAL";


            $this->AddItemCart($request->id, $request->name, $request->price, $qty, $request->gramature, $request->images, $types);
            $this->GiftBoxCart();
        } else {

            $cartitm = \Cart::getContent();
            $countitem = 1;
            foreach ($cartitm as $row) {
                if(strpos($row->id, $request->id) !== false )
                // if ($row->id==$request->id)
              {
                $countitem = $countitem + 1;
              }
            }

            $types = "GIFTSET" . $request->id.'-'.$countitem;

            // if(strpos($request->name, 'Gift Set') !== false )
            // {
            //     $newname = 'GS-'.$request->name;
            // }
            // else
            // {
            //     $newname = $request->name;
            // }

            

            $this->AddItemCart($request->id.'-'.$countitem, $request->name, $request->price, 1, $request->gramature, $request->images, $types);
            //dd(($request->giftsetproduct));
            $array = ($request->giftsetproduct);
            for ($i = 0; $i < count($array); $i++) {
                $p = json_decode($array[$i]);
                dump($p->id);
                dump($p->name);
                $this->AddItemCart('GIFT-SET-' . $p->id.'|'.$request->id.'-'.$countitem, $p->name, 0, 1, $p->gramature, $p->image, $types);
            }

            // $this->AddItemCart($request->id, $request->name, $request->price, $qty, $request->gramature, $request->images);
            //$this->GiftBoxCart();

            // return redirect()
            //     ->route('cart.list')
            //     ->with([
            //         'success' => 'New post has been created successfully'
            //     ]);

            // $arrResponse = $request->giftsetproduct;
            // foreach ($arrResponse as $value) {
            //     dump(json_decode($value)->id);
            // }

            //dd("ini gift set");
        }





        if ($request->redeem == 'true') {

            $Member_redeem_log_models = Member_redeem_log_model::create([
                'iduser' => $request->iduser,
                'idproduct_redeem' => $request->id,
                'member_point_origin' => $request->member_point_origin,
                'member_point_redeem' => $request->member_point_redeem,
                'member_point_actual' => $request->member_point_actual,
                'redeem_description' => '',
                'status' => 'active',
                'deleted' => 'false',

            ]);
            if ($Member_redeem_log_models) {
                return redirect()
                    ->route('cart.list')
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
            session(['totalbeforediscount' => \Cart::getTotal()]);
            return redirect()
                ->route('cart.list');
        } else {
            return redirect()
                ->route($redir, $request->id)
                ->with([
                    'message' => 'test'
                ]);
        }
    }

    public function addToCartModal(Request $request)
    {
        $types = "NORMAL";
        $this->AddItemCart($request->id, $request->name, $request->price, $request->quantity, $request->gramature, $request->images, $types);
        $this->GiftBoxCart();
        session(['totalbeforediscount' => \Cart::getTotal()]);
        return redirect()
            ->route('fproducts.index')
            ->with([
                'modal' => $request->id
            ]);
    }

    public function updateCart(Request $request)
    {
        $value = 0;
        //## kondisi saat qty barang dikurangi
        if (isset($_POST['minus'])) {
            if ($request->quantity > 1) {
                $value = $request->quantity - 1;
                $this->UpdateItemCart($request->id, $value);
            } else {
                $this->RemoveItemCart($request->id);
            }
            # Publish-button was clicked

            //## kondisi saat qty barang dikurangi
        } elseif (isset($_POST['plus'])) {
            if ($request->quantity < 100) {
                $value = $request->quantity + 1;
                $this->UpdateItemCart($request->id, $value);
            }
        }
        $this->GiftBoxCart();
        session(['totalbeforediscount' => \Cart::getTotal()]);
        session()->flash('success', 'Item Cart is Updated Successfully !');
        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        $items = \Cart::getContent();

        foreach ($items as $item) {
            $item->id; // the Id of the item
            $item->name; // the name
            $item->price; // the single price without conditions applied
            $item->getPriceSum(); // the subtotal without conditions applied
            $item->getPriceWithConditions(); // the single price with conditions applied
            $item->getPriceSumWithConditions(); // the subtotal with conditions applied
            $item->quantity; // the quantity
            $item->attributes; // the attributes
            // dump($item);
            // dump($item->id);
            // dump($item->attributes["types"]);
            // dump("GIFTSET" . $request->id);
            // dump("============================");
            //if ($item->id == $request->id) {
            //dump("ada gift set");

            if (($item->attributes["types"]) == ("GIFTSET" . $request->id)) {
                //dump("hapus id ".$item->id);
                //     dump($item->id);
                \Cart::remove($item->id);
                $this->GiftBoxCart();
                session(['totalbeforediscount' => \Cart::getTotal()]);
                session()->flash('success', 'Item Cart Remove Successfully !');
                // return redirect()->route('cart.list');
            } else {
                //dump("bukan giftset");
            }
            //}
        }
        //dd("hapus");
        \Cart::remove($request->id);
        $this->GiftBoxCart();
        session(['totalbeforediscount' => \Cart::getTotal()]);
        session()->flash('success', 'Item Cart Remove Successfully !');
        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();
        session(['totalbeforediscount' => \Cart::getTotal()]);
        session()->flash('success', 'All Item Cart Clear Successfully !');
        return redirect()->route('cart.list');
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



        foreach ($product_free_gift_models_res as $key => $items) {
            $gft = $items;
            $gft->gift_box_id = ($items->product_id);
            $gft->gift_box_name = ($items->product_name);
            $gft->gift_box_minimum_order = ($items->minimum_order);
            $gft->gift_box_real_price = ($items->product_price);
            $gft->min_gift_box_real_price = $gft->gift_box_real_price * -1;

            if (!empty($items->fileimages)) {
                $gft->gift_box_images = (json_decode($items->fileimages))[0];
            } else {
                $gft->gift_box_images = null;
            }

            array_push($gift, $gft);
        }


        return $gift;

        // $gft = $product_free_gift_models_res[0];
        // $gft->gift_box_id = ($product_free_gift_models_res[0]->product_id);
        // $gft->gift_box_name = ($product_free_gift_models_res[0]->product_name);
        // $gft->gift_box_minimum_order = ($product_free_gift_models_res[0]->minimum_order);
        // $gft->gift_box_real_price = ($product_free_gift_models_res[0]->product_price);
        // $gft->min_gift_box_real_price = $gft->gift_box_real_price * -1;

        // if (!empty($product_free_gift_models_res[0]->fileimages)) {
        //     $gft->gift_box_images = (json_decode($product_free_gift_models_res[0]->fileimages))[0];
        // } else {
        //     $gft->gift_box_images = null;
        // }

        // array_push($gift, $gft);
        // return $gift[0];
    }
    public function AddItemCart($id, $name, $price, $qty, $gramature, $images, $types)
    {
        //if($types =='Giftset')

        \Cart::add(
            [
                'id' => $id,
                'name' => $name,
                'price' => $price,
                'quantity' => $qty,
                'attributes' => array(
                    'gramature' => $gramature,
                    'images' => $images,
                    'types' => $types
                )
            ]
        );
    }
    public function UpdateItemCart($id, $value)
    {
        \Cart::update(
            $id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $value
                ],
            ]
        );
    }
    public function RemoveItemCart($id)
    {
        \Cart::remove($id);
    }
    public function GiftBoxCart()
    {
        //$gift = $this->getFreeGift();
        $gift_product = $this->getFreeGift();
        $gift = [];
        foreach ($gift_product as $key => $items) {
            $gft = $items;

            $gft->gift_box_id = "GIFT-" . $items->gift_box_id;
            $gft->gift_box_images =  $items->gift_box_images;

            if (!empty($items->fileimages)) {
                $gft->gift_box_images = (json_decode($items->fileimages))[0];
            } else {
                $gft->gift_box_images = null;
            }

            array_push($gift, $gft);
        }

        $cartItems = \Cart::getContent();
        $gift_box_id_chosen = Session::get('gift');

        #check apakah gift box sudah pernah dipilih client
        if ($gift_box_id_chosen === 'null') {
            #gift box belum pernah dipilih
            $gift_box_id = $gift_product[0]->gift_box_id;
            $gift_box_images =  $gift_product[0]->gift_box_images;
            $gift_box_name = $gift_product[0]->gift_box_name;
            $gift_box_minimum_order = $gift_product[0]->gift_box_minimum_order;
            $gift_box_real_price = $gift_product[0]->gift_box_real_price;
            $gift_box_images = $gift_product[0]->gift_box_images;
            $product_weight = $gift_product[0]->product_weight;
            $gift_box_gramature = $product_weight;
        } else {
            #gift box sudah pernah dipilih
            $filtered = array();
            $rows = $gift;
            foreach ($rows as $index => $columns) {
                foreach ($columns as $key => $value) {
                    if ($key == 'product_id' && $value ==  $gift_box_id_chosen) {
                        $filtered[] = $columns;
                    }
                }
            }

            if ($filtered) {
                $gift_box_id = $filtered[0]->gift_box_id;
                $gift_box_images =  $filtered[0]->gift_box_images;
                $gift_box_name = $filtered[0]->gift_box_name;
                $gift_box_minimum_order = $filtered[0]->gift_box_minimum_order;
                $gift_box_real_price = $filtered[0]->gift_box_real_price;
                $gift_box_images = $filtered[0]->gift_box_images;
                $product_weight = $filtered[0]->product_weight;
                $gift_box_gramature = $product_weight;
            } else {

                $gift_box_id = $gift_product[0]->gift_box_id;
                $gift_box_images =  $gift_product[0]->gift_box_images;
                $gift_box_name = $gift_product[0]->gift_box_name;
                $gift_box_minimum_order = $gift_product[0]->gift_box_minimum_order;
                $gift_box_real_price = $gift_product[0]->gift_box_real_price;
                $gift_box_images = $gift_product[0]->gift_box_images;
                $product_weight = $gift_product[0]->product_weight;
                $gift_box_gramature = $product_weight;
            }
        }

        #check condition apakah sub total sudah memungkinkan mendapatkan free gift box
        // if (\Cart::getSubTotal() >   $gift_box_minimum_order) {
        //     if (empty($cartItems[$gift_box_id])) {
        //         $this->AddItemCart($gift_box_id, $gift_box_name, 0, 1, $gift_box_gramature, $gift_box_images);
        //     }
        // } else 
        if (\Cart::getSubTotal() <   $gift_box_minimum_order) {
            $this->RemoveItemCart($gift_box_id);
        }
    }
}
