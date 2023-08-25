<?php

namespace App\Http\Controllers\Freegift;

use App\Models\Product_free_gift_model;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

use DB;

class FreegiftController extends Controller
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
       
        $product_free_gift_models =  DB::select("SELECT pfg.id, pfg.product_id, p.product_name,p.fileimages, pfg.minimum_order , pfg.status from product_free_gift_models as pfg inner join product_models as p on p.id =  pfg.product_id");
        
        
        return view('product-freegift/index', compact('product_free_gift_models'))
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

        return view('product-freegift/create',compact('product'));
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
        // dd($request->minorder);

        $product_models = Product_free_gift_model::create([
            'product_id' => $request->id_product,
            'minimum_order' => $request->minorder,
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
        $product_free_gift_models =  DB::select("SELECT pfg.id, pfg.product_id, p.product_name, pfg.minimum_order , pfg.status from product_free_gift_models as pfg inner join product_models as p on p.id =  pfg.product_id where pfg.id = ".$id);
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
        return view('product-freegift.show', compact('product_free_gift_models','product'));

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        $product_free_gift_models =  DB::select("SELECT pfg.id, pfg.product_id, p.product_name, pfg.minimum_order , pfg.status from product_free_gift_models as pfg inner join product_models as p on p.id =  pfg.product_id where pfg.id = ".$id);
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
        return view('product-freegift.edit', compact('product_free_gift_models','product'));
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

        // dump($request->minorder);
        // dd($request->id_product);

        $product_free_gift_models = Product_free_gift_model::findOrFail($id);

        $product_free_gift_models->update([
            'product_id' => $request->id_product,
            'minimum_order' => $request->minorder,
            'status' => 'active',
            'deleted' => 'false',
        ]);

        if ($product_free_gift_models) {
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
