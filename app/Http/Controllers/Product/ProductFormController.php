<?php

namespace App\Http\Controllers\Product;

use App\Models\Product_form_model;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductFormController extends Controller
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
        //$product_form_models = Product_form_model::latest()->get();
        $product_form_models = DB::table('product_form_models')->where('deleted', 'false')->get();
        return view('product-forms/index', compact('product_form_models'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product-forms/create');
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
            'product_form_name' => 'required'
        ]);

        $product_form_models = Product_form_model::create([
            'product_form_name' => $request->product_form_name,
            'product_form_desc' => $request->product_form_desc,
            'status' => $request->status,
            // 'slug' => Str::slug($request->product)
        ]);

        if ($product_form_models) {
            return redirect()
                ->route('product-forms.index')
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
        $product_form_models = Product_form_model::find($id);
        return view('product-forms.show', compact('product_form_models'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_form_models = Product_form_model::findOrFail($id);
        return view('product-forms.edit', compact('product_form_models'));
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
            'product_form_name' => 'required'
        ]);

        $product_form_models = Product_form_model::findOrFail($id);

        $product_form_models->update([
            'product_form_name' => $request->product_form_name,
            'product_form_desc' => $request->product_form_desc,
            'status' => $request->status,
        ]);

        if ($product_form_models) {
            return redirect()
                ->route('product-forms.index')
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
        $product_form_models = Product_form_model::findOrFail($id);

        $product_form_models->update([
            'deleted' => 'true',
        ]);

        return redirect()->route('product-forms.index')
            ->with('success', 'Product Forms deleted successfully');
    }
}
