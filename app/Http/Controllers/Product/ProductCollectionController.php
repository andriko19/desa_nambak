<?php

namespace App\Http\Controllers\Product;

use App\Models\Product_collection_model;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductCollectionController extends Controller
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
        //$product_collection_models = Product_collection_model::latest()->get();
        $product_collection_models = DB::table('product_collection_models')->where('deleted', 'false')->orderBy('order', 'asc')->get();
        return view('product-collections/index', compact('product_collection_models'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product-collections/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd("ayam");
        $this->validate($request, [
            'product_collection_name' => 'required'
        ]);

        $product_collection_models = Product_collection_model::create([
            'product_collection_name' => $request->product_collection_name,
            'product_collection_desc' => $request->product_collection_desc,
            'status' => $request->status,
            // 'slug' => Str::slug($request->product)
        ]);

        if ($product_collection_models) {
            return redirect()
                ->route('product-collections.index')
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
        $product_collection_models = Product_collection_model::find($id);
        return view('product-collections.show', compact('product_collection_models'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_collection_models = Product_collection_model::findOrFail($id);
        return view('product-collections.edit', compact('product_collection_models'));
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
            'product_collection_name' => 'required'
        ]);

        $product_collection_models = Product_collection_model::findOrFail($id);

        $product_collection_models->update([
            'product_collection_name' => $request->product_collection_name,
            'product_collection_desc' => $request->product_collection_desc,
            'status' => $request->status,
            'order' => $request->order
        ]);

        if ($product_collection_models) {
            return redirect()
                ->route('product-collections.index')
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
        $product_collection_models = Product_collection_model::findOrFail($id);

        $product_collection_models->update([
            'deleted' => 'true',
        ]);

        return redirect()->route('product-collections.index')
            ->with('success', 'Product Forms deleted successfully');
    }
}
