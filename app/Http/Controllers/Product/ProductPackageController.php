<?php

namespace App\Http\Controllers\Product;

use App\Models\Product_package_model;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductPackageController extends Controller
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
        //$product_package_models = Product_package_model::latest()->get();
        $product_package_models = DB::table('product_package_models')->where('deleted', 'false')->get();
        return view('product-packages/index', compact('product_package_models'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product-packages/create');
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
            'product_package_name' => 'required'
        ]);

        $product_package_models = Product_package_model::create([
            'product_package_name' => $request->product_package_name,
            'product_package_desc' => $request->product_package_desc,
            'status' => $request->status,
            // 'slug' => Str::slug($request->product)
        ]);

        if ($product_package_models) {
            return redirect()
                ->route('product-packages.index')
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
        $product_package_models = Product_package_model::find($id);
        return view('product-packages.show', compact('product_package_models'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_package_models = Product_package_model::findOrFail($id);
        return view('product-packages.edit', compact('product_package_models'));
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
            'product_package_name' => 'required'
        ]);

        $product_package_models = Product_package_model::findOrFail($id);

        $product_package_models->update([
            'product_package_name' => $request->product_package_name,
            'product_package_desc' => $request->product_package_desc,
            'status' => $request->status,
        ]);

        if ($product_package_models) {
            return redirect()
                ->route('product-packages.index')
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
        $product_package_models = Product_package_model::findOrFail($id);

        $product_package_models->update([
            'deleted' => 'true',
        ]);

        return redirect()->route('product-packages.index')
            ->with('success', 'Product Forms deleted successfully');
    }
}