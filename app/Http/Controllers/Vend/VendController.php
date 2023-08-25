<?php

namespace App\Http\Controllers\Vend;

use App\Models\Blog_article_category_model;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client as GuzzleClient;

use DB;

class VendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $product_models = Product_model::latest()->get();

        $blog_article_category_models =  DB::table('blog_article_category_models')
            ->get();
        // dd($product_models);
        // return view('posts.index', compact('posts'));
        return view('blog-article-categorys/index', compact('blog_article_category_models'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function getproduct(Request $request)
    {
      
        $headers = [
            'Authorization' => 'Bearer Cl2iG3P2M5cs6JTkGGWpl_VETaQqAMucGlqehvCv',
        ];

        $params = ['sku'=>10140];
        
        $client = new GuzzleClient([
            'headers' => $headers,
        ]);
        $body = '{
           "sku" => "10140"
        }';
       
        
        $r = $client->request('GET', 'https://supressocoffee.vendhq.com/api/products/', 
            [
            'query' => 
                [
                'sku' => 10140,
                ],
            'body' => [],
            ]);
        $response = $r->getBody()->getContents();

        dd($response);

    }

    public function gettransaction(Request $request)
    {
        $headers = [
            'Authorization' => 'Bearer Cl2iG3P2M5cs6JTkGGWpl_VETaQqAMucGlqehvCv',
            'Cookie' => 'rguserid=4f34753d-6764-412e-b2fe-6e99d2c0871a; rguuid=true; rgisanonymous=true',
            'Key' => 'e791365f6d3d4bb1a6f03c8ad509f106'
        ];

        $params = ['sku'=>10140];
        
        $client = new GuzzleClient([
            'headers' => $headers,
        ]);
        $body = '{
           "sku" => "10140"
        }';
       
        
        $r = $client->request('GET', 'https://supressocoffee.vendhq.com/api/register_sales?since', 
            [
            'query' => 
                [
                'since' => '',
                ]
            ]);
        $response = ($r->getBody()->getContents());
        $res = json_decode($r->getBody(), true);
        // dump($res["register_sales"][0]);
        // dd(gettype($response));
        $responsetransaction = $res["register_sales"];

        // for ($i=0; $i < count($responsetransaction) ; $i++) { 
        //     $transaction  = $responsetransaction[$i];
        //     dump($transaction["register_sale_products"]);
        // }

        return view('vend/listtransaction', compact('responsetransaction'))
        ->with('i', ($request->input('page', 1) - 1) * 5);


    }

    public function getvendcustomersvend($offset)
    {
       
        //$email = 'andykuancm@yahoo.com';
        $headers = [
            'Authorization' => 'Bearer Cl2iG3P2M5cs6JTkGGWpl_VETaQqAMucGlqehvCv',
            'Cookie' => 'rguserid=4f34753d-6764-412e-b2fe-6e99d2c0871a; rguuid=true; rgisanonymous=true',
            'Key' => 'e791365f6d3d4bb1a6f03c8ad509f106'
        ]; 
        $client = new GuzzleClient([
            'headers' => $headers,
        ]);

        $r = $client->request('GET', 'https://supressocoffee.vendhq.com/api/2.0/search', 
            [
            'query' => 
                [
                'type'=>'customers',
                'offset' => $offset,
                ]
            ]);
        $response = ($r->getBody()->getContents());
        $res = json_decode($r->getBody(), true, 512, JSON_BIGINT_AS_STRING);
       return $res;
    }

    public function getvendsalesbyinvoice($invoice)
    {
       
        //$email = 'andykuancm@yahoo.com';
        $headers = [
            'Authorization' => 'Bearer Cl2iG3P2M5cs6JTkGGWpl_VETaQqAMucGlqehvCv',
            'Cookie' => 'rguserid=4f34753d-6764-412e-b2fe-6e99d2c0871a; rguuid=true; rgisanonymous=true',
            'Key' => 'e791365f6d3d4bb1a6f03c8ad509f106'
        ]; 
        $client = new GuzzleClient([
            'headers' => $headers,
        ]);

        $r = $client->request('GET', 'https://supressocoffee.vendhq.com/api/2.0/search', 
            [
            'query' => 
                [
                'type'=>'sales',
                'invoice_number' => $invoice,
                ]
            ]);
        $response = ($r->getBody()->getContents());
        $res = json_decode($r->getBody(), true, 512, JSON_BIGINT_AS_STRING);
       return $res;
    }

    public function getallproduct()
    {
       
        //$email = 'andykuancm@yahoo.com';
        $headers = [
            'Authorization' => 'Bearer Cl2iG3P2M5cs6JTkGGWpl_VETaQqAMucGlqehvCv',
            'Cookie' => 'rguserid=4f34753d-6764-412e-b2fe-6e99d2c0871a; rguuid=true; rgisanonymous=true',
            'Key' => 'e791365f6d3d4bb1a6f03c8ad509f106'
        ]; 
        $client = new GuzzleClient([
            'headers' => $headers,
        ]);

        $r = $client->request('GET', 'https://supressocoffee.vendhq.com/api/2.0/search', 
            [
            'query' => 
                [
                'type'=>'products',
                ]
            ]);
        $response = ($r->getBody()->getContents());
        $res = json_decode($r->getBody(), true, 512, JSON_BIGINT_AS_STRING);
       return $res;
    }

    public function gettransactionbyemail()
    {
       
        $email = 'andykuancm@yahoo.com';
        $headers = [
            'Authorization' => 'Bearer Cl2iG3P2M5cs6JTkGGWpl_VETaQqAMucGlqehvCv',
            'Cookie' => 'rguserid=4f34753d-6764-412e-b2fe-6e99d2c0871a; rguuid=true; rgisanonymous=true',
            'Key' => 'e791365f6d3d4bb1a6f03c8ad509f106'
        ]; 
        $client = new GuzzleClient([
            'headers' => $headers,
        ]);

        $r = $client->request('GET', 'https://supressocoffee.vendhq.com/api/2.0/search', 
            [
            'query' => 
                [
                'type'=>'customers',
                'email' => 'andykuancm@yahoo.com',
                ]
            ]);
        $response = ($r->getBody()->getContents());
        $res = json_decode($r->getBody(), true);
        $resmember = $res["data"][0];
        $member_id = $resmember["id"];
       

        $sales = new GuzzleClient([
            'headers' => $headers,
        ]);

        $p = $sales->request('GET', 'https://supressocoffee.vendhq.com/api/2.0/search', 
        [
        'query' => 
            [
            'type'=>'sales',
            'customer_id' => $member_id,
            ]
        ]);

        $responsesales = ($p->getBody()->getContents());
        $ressales = json_decode($p->getBody(), true);
        


       return $ressales["data"];

      
        // return view('vend/listtransaction', compact('responsetransaction'))
        // ->with('i', ($request->input('page', 1) - 1) * 5);


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products/create');
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
            'product' => 'required'
        ]);

        $product_models = Blog_article_category_model::create([
            'id_category_product' => $request->id_category_product,
            'product' => $request->product,
            'description' => $request->description,
            // 'slug' => Str::slug($request->product)
        ]);

        if ($product_models) {
            return redirect()
                ->route('product.index')
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     
    }
}
