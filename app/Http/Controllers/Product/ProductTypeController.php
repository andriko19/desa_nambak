<?php

namespace App\Http\Controllers\Product;

use App\Models\Product_type_model;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductTypeController extends Controller
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
        //$product_type_models = Product_type_model::latest()->get();
        $product_type_models = DB::table('product_type_models')->where('deleted', 'false')->get();
        return view('product-types/index', compact('product_type_models'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product-types/create');
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
            'product_type_name' => 'required'
        ]);

        $product_type_models = Product_type_model::create([
            'product_type_name' => $request->product_type_name,
            'product_type_desc' => $request->product_type_desc,
            'status' => $request->status,
            // 'slug' => Str::slug($request->product)
        ]);

        if ($product_type_models) {
            return redirect()
                ->route('product-types.index')
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
        $product_type_models = Product_type_model::find($id);
        return view('product-types.show', compact('product_type_models'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_type_models = Product_type_model::findOrFail($id);
        return view('product-types.edit', compact('product_type_models'));
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
            'product_type_name' => 'required'
        ]);

        $product_type_models = Product_type_model::findOrFail($id);

        $product_type_models->update([
            'product_type_name' => $request->product_type_name,
            'product_type_desc' => $request->product_type_desc,
            'status' => $request->status,
        ]);

        if ($product_type_models) {
            return redirect()
                ->route('product-types.index')
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
        $product_type_models = Product_type_model::findOrFail($id);

        $product_type_models->update([
            'deleted' => 'true',
        ]);

        return redirect()->route('product-types.index')
            ->with('success', 'Product Types deleted successfully');
    }
}
