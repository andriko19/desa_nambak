<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Banner_model;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Banner';
        $pages = 'List Banner';
        $banners = Banner_model::all();
        return view('admin/banner', compact('title', 'pages', 'banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'jenis' => 'required|not_in:0',
                'judul' => 'required',
                'deskripsi' => 'required',
                'file' => 'required',
            ],
            [
                'judul.required' => 'The Judul field is required.',
                'deskripsi.required' => 'The Deskripsi field is required.',
                'file.required' => 'The Gambar field is required.',
            ]
        );

        //check if validation fails
        if ($validator->passes()) {
            if ($request->hasfile('file')) {

                $gambar = $request->file('file');
                $nama = time() . rand(1, 100) . '.' . $gambar->extension();
                $gambar->move(public_path('uploads/banner'), $nama);

                // insert to db
                $Banner = Banner_model::create([
                    'judul' => $request->judul,
                    'deskripsi' => $request->deskripsi,
                    'jenis' => $request->jenis,
                    'gambar' => $nama,
                ]);

            }

            return response()->json(['message' => 'Berhasil menambahkan data baru!']);
        }

        return response()->json(['error' => $validator->errors()->all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Banner = Banner_model::find($id);

        return response()->json([
            'success' => true,
            'data'    => $Banner
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $validator = Validator::make(
            $request->all(),
            [
                'edit_jenis' => 'required|not_in:0',
                'edit_judul' => 'required',
                'edit_deskripsi' => 'required',
                // 'edit_file' => 'required',
            ],
            [
                'edit_judul.required' => 'The Judul field is required.',
                'edit_deskripsi.required' => 'The Deskripsi field is required.',
                'file.required' => 'The Gambar field is required.',
            ]
        );

        //check if validation fails
        if ($validator->passes()) {
            $Banner = Banner_model::findOrFail($id);

            if($request->file('edit_file') == "") {

                $Banner->update([
                    'judul' => $request->edit_judul,
                    'deskripsi' => $request->edit_deskripsi,
                    'jenis' => $request->edit_jenis,
                ]);
        
            } else {
                //hapus old image
                unlink(public_path('uploads/banner/').$Banner->gambar);
        
                //upload new image
                $gambar = $request->file('edit_file');
                $nama = time() . rand(1, 100) . '.' . $gambar->extension();
                $gambar->move(public_path('uploads/banner'), $nama);
        
                $Banner->update([
                    'judul' => $request->edit_judul,
                    'deskripsi' => $request->edit_deskripsi,
                    'jenis' => $request->edit_jenis,
                    'gambar' => $nama,
                ]);
        
            }
            
            return response()->json(['message' => 'Berhasil edit data!']);
        }

        return response()->json(['error' => $validator->errors()->all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Banner = Banner_model::findOrFail($id);
        //hapus old image
        unlink(public_path('uploads/banner/').$Banner->gambar);
        
        Banner_model::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Hapus data!',
            // 'data'    => $post
        ]);
    }
}
