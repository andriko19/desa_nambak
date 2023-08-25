<?php


namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Str;

class ProductImageController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $data = [];
        if (isset($_GET['id_product'])) {
            $id_product = $_GET['id_product'];
            $product_models =  DB::table('product_models')
                ->where('product_models.id', '=', $id_product)
                ->get();

            return view('images.create-image-product', compact('data', 'product_models'));
        }

        //dd($bahasa);
        return view('images.create', compact('data'));
    }

    public function insertImages($id)
    {
        $product_models =  DB::table('product_models')
            ->where('product_models.id', '=', $id);
        //$id_product = $id;
        // if (isset($_GET['idproduct'])) {
        //     $id_product = $_GET['idproduct'];
        // }
        return view('images.create', compact('$product_models'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        //     $this->validate($request, [
        //     'filenames' => 'required',
        //     'filenames.*' => 'mimes:jpeg,png,jpg,gif,svg'
        // ]);


        // if ($request->hasfile('filenames')) {
        //     foreach ($request->file('filenames') as $file) {
        //         $name = time() . '.' . $file->extension();
        //         $file->move(public_path() . '/files/product-images/', $name);
        //         $data[] = $name;
        //         $files[] = $name;
        //     }
        // }

        // $file = new File();
        // $file->filenames = $files;
        // $file->id_product = $request->id_product;
        // $file->save();

        // return back()->with('success', 'Data Your files has been successfully added');
        $this->validate($request, [
            'filenames' => 'required',
            'filenames.*' => 'image'
        ]);

        $files = [];
        if ($request->hasfile('filenames')) {
            foreach ($request->file('filenames') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('files/product-images'), $name);
                $files[] = $name;
            }
        }

        $file = new File();
        $file->filenames = $files;
        $file->id_product = $request->id_product;
        $file->save();

        return back()->with('success', 'Data Your files has been successfully added');
    }
}