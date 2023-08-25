<?php

namespace App\Http\Controllers\Flashsale;

use App\Models\Product_flash_sale_model;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

use DB;

class FlashsaleController extends Controller
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
       
        $product_flash_sale_models =  DB::select("SELECT pfg.id, pfg.product_id, p.product_name,p.fileimages, pfg.flash_sale_price , pfg.status from product_flash_sale_models as pfg inner join product_models as p on p.id =  pfg.product_id");
        
        
        return view('product-flashsale/index', compact('product_flash_sale_models'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product =  DB::table('product_models')->where('product_models.deleted', 'false')

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
        ->get();

        return view('product-flashsale/create',compact('product'));
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
            'id_product' => 'required'
        ]);

        // dump($request->id_product);
        // dd($request->flashsaleprice);

        $product_models = Product_flash_sale_model::create([
            'product_id' => $request->id_product,
            'flash_sale_price' => $request->flashsaleprice,
            'status' => 'active',
            'deleted' => 'false',

        ]);

        if ($product_models) {
            return redirect()
                ->route('freegift.index')
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

     
          $product_flash_sale_models =  DB::select("SELECT pfg.id, pfg.product_id, p.product_name, pfg.flash_sale_price , pfg.status from product_flash_sale_models as pfg inner join product_models as p on p.id =  pfg.product_id where pfg.id = ".$id);
          $product =  DB::table('product_models')->where('product_models.deleted', 'false')
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
          ->get();
          return view('product-flashsale.show', compact('product_flash_sale_models','product'));

     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $product_flash_sale_models = Product_flash_sale_model::findOrFail($id);
        $product_flash_sale_models =  DB::select("SELECT pfg.id, pfg.product_id, p.product_name, pfg.flash_sale_price , pfg.status from product_flash_sale_models as pfg inner join product_models as p on p.id =  pfg.product_id where pfg.id = ".$id);
        //dd($product_flash_sale_models);
        $product =  DB::table('product_models')->where('product_models.deleted', 'false')
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
        ->get();
        return view('product-flashsale.edit', compact('product_flash_sale_models','product'));
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
        $this->validate($request, [
            'id_product' => 'required'
        ]);

        // dump($request->flashsaleprice);
        // dd($request->id_product);

        $product_flash_sale_models = Product_flash_sale_model::findOrFail($id);

        $product_flash_sale_models->update([
            'product_id' => $request->id_product,
            'flash_sale_price' => $request->flashsaleprice,
            'status' => 'active',
            'deleted' => 'false',
        ]);

        if ($product_flash_sale_models) {
            return redirect()
                ->route('freegift.index')
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
    }
}
