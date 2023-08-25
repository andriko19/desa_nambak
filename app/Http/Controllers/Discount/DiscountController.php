<?php

namespace App\Http\Controllers\Discount;


use App\Models\Discount_cluster_model;
use App\Models\Discount_model;
use App\Models\File;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DiscountController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd(isset($request->id_discount_cluster));


        if (isset($request->id_discount_cluster)) {
            $id_discount_cluster =  $request->id_discount_cluster;
            //dd($request->id_discount_cluster);
            $discount_cluster_res =  DB::table('discount_cluster_models')
                ->where('id', $request->id_discount_cluster)
                ->get();
        }

// dd( $discount_cluster_res);

        $discount_cluster_models = $discount_cluster_res[0];

        $discount_models =  DB::table('discount_models')
            ->where('discount_cluster_id', $id_discount_cluster)
            ->leftjoin(
                'product_models',
                'discount_models.product_id',
                '=',
                'product_models.id'
            )
            ->leftjoin(
                'discount_cluster_models',
                'discount_models.discount_cluster_id',
                '=',
                'discount_cluster_models.id'
            )
            ->get();

        //dd($discount_models);
        return view('discount/index', compact('discount_models', 'discount_cluster_models', 'id_discount_cluster'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function addall(Request $request)
    {
        $id_discount_cluster = ( $request->id_discount_cluster);
        
        $all_product_res = DB::table('product_models')->where('product_models.deleted', 'false')

        ->leftjoin(
            'product_collection_models',
            'product_models.product_collection',
            '=',
            'product_collection_models.id'
        )
        ->leftjoin(
            'product_type_models',
            'product_models.product_type',
            '=',
            'product_type_models.id'
        )
        ->leftjoin(
            'product_form_models',
            'product_models.product_form',
            '=',
            'product_form_models.id'
        )
        ->leftjoin(
            'product_package_models',
            'product_models.product_package',
            '=',
            'product_package_models.id'
        )

        ->select(
            'product_models.*',
            'product_collection_models.product_collection_name',
            'product_type_models.product_type_name',
            'product_form_models.product_form_name',
            'product_package_models.product_package_name'
        )
        ->orderBy('product_collection_models.id', 'DESC')
        ->get();
  
        return view('discount/addall', compact('all_product_res','id_discount_cluster'))->with('i', ($request->input('page', 1) - 1) * 5);

    }

    public function storeall(Request $request)
    {
       
       
        
        $all_product_res = DB::select("select * from product_models");
       
        for ($i=0; $i < count( $all_product_res); $i++) {
            
          
if($request->discount[$i]<>0)
{
    $discount_models = Discount_model::create([
                'discount_cluster_id'  => $request->id_discount_cluster,
                'product_id' => $request->id[$i],
                'discount' => $request->discount[$i]
            ]);
}
            
        }
        if ($discount_models) {
            return redirect()
                ->route('discount.index', 'id_discount_cluster=' . $request->id_discount_cluster)
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if (isset($request->id_discount_cluster)) {
            $id_discount_cluster =  $request->id_discount_cluster;
        }

        $product_collection = [];
        $product_collection_models_res =  DB::table('product_collection_models')
            ->where('deleted', 'false')
            ->orderBy('id', 'desc')
            ->get();
        //dump($product_collection_models_res);

        for ($c = 0; $c < count($product_collection_models_res); $c++) {
            $cp = $product_collection_models_res[$c];
            $product_mdls[$c] = [];
            $product_collection_models_res[$c] =  DB::table('product_models')
                ->where('deleted', 'false')
                ->where('product_collection', $cp->id)
                ->get();
            for ($pr = 0; $pr < count($product_collection_models_res[$c]); $pr++) {
                $prdct[$pr] = $product_collection_models_res[$c][$pr];
                if (!empty($prdct[$pr]->fileimages)) {
                    $prdct[$pr]->images = json_decode($product_collection_models_res[$c][$pr]->fileimages);
                } else {
                    $prdct[$pr]->images = null;
                }
                array_push($product_mdls[$c], $prdct[$pr]);
            }
            $cp->product = $product_mdls[$c];
            array_push($product_collection, $cp);
        }

        //dd($product_collection);


        $discount_models =  DB::table('discount_models')->get();
        $product_models =  DB::table('product_models')->get();
        return view('discount/create', compact('discount_models', 'product_collection', 'id_discount_cluster'));
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
            'product_id' => 'required'
        ]);

        $files = [];
        if ($request->hasfile('filenames')) {
            foreach ($request->file('filenames') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('files/product-images'), $name);
                $files[] = $name;
            }
        }

        $discount_models = Discount_model::create([
            'discount_cluster_id'  => $request->id_discount_cluster,
            'product_id' => $request->product_id,
            'discount' => $request->discount
        ]);

        if ($discount_models) {
            return redirect()
                ->route('discount.index', 'id_discount_cluster=' . $request->id_discount_cluster)
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
        $pict = [];
        $images = DB::table('files')->where('files.id_product', '=', $id)->get();

        for ($p = 0; $p < count($images); $p++) {
            $pct = $images[$p]->filenames;
            $fileimages = json_decode($images[$p]->filenames);

            for ($gimg = 0; $gimg < count($fileimages); $gimg++) {
                $imgs =  $fileimages[$gimg];
                array_push($pict, $imgs);
            }
            //dump($images[$p]->filenames[1]);

            //array_push($pict, $pct);
        }
        $product_models =  DB::table('product_models')
            ->where('product_models.id', '=', $id)
            // ->leftjoin(
            //     'product_kind_models',
            //     'product_models.product_kind',
            //     '=',
            //     'product_kind_models.id'
            // )
            // ->leftjoin(
            //     'product_variant_models',
            //     'product_models.product_variant',
            //     '=',
            //     'product_variant_models.id'
            // )
            // ->leftjoin(
            //     'product_category_models',
            //     'product_models.product_category',
            //     '=',
            //     'product_category_models.id'
            // )
            // ->leftjoin(
            //     'product_collection_models',
            //     'product_models.product_collection',
            //     '=',
            //     'product_collection_models.id'
            // )
            // ->select(
            //     'product_models.*',
            //     'product_kind_models.product_kind_name',
            //     'product_variant_models.product_variant_name',
            //     'product_category_models.product_category_name',
            //     'product_collection_models.product_collection_name'
            // )

            ->get();
        //dd($product_models);
        // return view('posts.index', compact('posts'));
        return view('products/show', compact('product_models', 'pict'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_collection_models =  DB::table('product_collection_models')->get();
        $product_type_models =  DB::table('product_type_models')->get();
        $product_form_models =  DB::table('product_form_models')->get();
        $product_package_models =  DB::table('product_package_models')->get();

        $product_models = Product_model::findOrFail($id);
        $images = json_decode($product_models->fileimages);
        //dd($images);
        return view('products.edit', compact(
            'product_models',
            'product_collection_models',
            'product_type_models',
            'product_form_models',
            'product_package_models',
            'images'
        ));
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
        //dd('test');
        $this->validate($request, [
            'product_name' => 'required'
        ]);


        $product_models = Product_model::findOrFail($id);

        $files = [];

        if ($request->hasfile('filenames')) {
            foreach ($request->file('filenames') as $file) {
                //dd($file->getClientOriginalName());
                $name = $file->getClientOriginalName();
                $file->move(public_path('files/product-images'), $name);
                $files[] = $name;
            }
            //dd($files);

            $product_models->update([
                'sku' => $request->sku,
                'product_name' => $request->product_name,
                'product_detail' => $request->product_detail,
                'product_shortdetail' => $request->product_shortdetail,
                'product_brand' => $request->product_brand,
                'product_collection' => $request->product_collection,
                'product_type' => $request->product_type,
                'product_form' => $request->product_form,
                'product_package' => $request->product_package,
                'product_price' => $request->product_price,
                'product_price_currency' => $request->product_price_currency,
                'product_weight' => $request->product_weight,
                'product_width' => $request->product_width,
                'product_height' => $request->product_height,
                'product_length' => $request->product_length,
                'product_acidityscore' => $request->product_acidityscore,
                'product_aciditydesc' => $request->product_aciditydesc,
                'product_bodyscore' => $request->product_bodyscore,
                'product_bodydesc' => $request->product_bodydesc,
                'product_roastdesc' => $request->product_roastdesc,
                'product_typedesc' => $request->product_typedesc,
                'product_intensity' => $request->product_intensity,
                'fileimages' => $files,
                'status_stock' => $request->status_stock,
                'status' => $request->status
            ]);
        } else {

            dd($files);

            $product_models->update([
                'sku' => $request->sku,
                'product_name' => $request->product_name,
                'product_detail' => $request->product_detail,
                'product_shortdetail' => $request->product_shortdetail,
                'product_brand' => $request->product_brand,
                'product_collection' => $request->product_collection,
                'product_type' => $request->product_type,
                'product_form' => $request->product_form,
                'product_package' => $request->product_package,
                'product_price' => $request->product_price,
                'product_price_currency' => $request->product_price_currency,
                'product_weight' => $request->product_weight,
                'product_width' => $request->product_width,
                'product_height' => $request->product_height,
                'product_length' => $request->product_length,
                'product_acidityscore' => $request->product_acidityscore,
                'product_aciditydesc' => $request->product_aciditydesc,
                'product_bodyscore' => $request->product_bodyscore,
                'product_bodydesc' => $request->product_bodydesc,
                'product_roastdesc' => $request->product_roastdesc,
                'product_typedesc' => $request->product_typedesc,
                'product_intensity' => $request->product_intensity,
                'status_stock' => $request->status_stock,
                'status' => $request->status
            ]);
        }

        // if ($request->hasfile('filenames')) {
        //     foreach ($request->file('filenames') as $file) {
        //         $name = time() . rand(1, 100) . '.' . $file->extension();
        //         $file->move(public_path('files/product-images'), $name);
        //         $files[] = $name;
        //     }
        // }



        if ($product_models) {
            return redirect()
                ->route('products.index')
                ->with([
                    'success' => 'Post has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product_models = Product_model::findOrFail($id);

        $product_models->update([
            'deleted' => 'true',
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Product Types deleted successfully');
    }
}