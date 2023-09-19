<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Layanan_model;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idmodal = 'Layanan';
        $title = 'Layanan';
        $pages = 'List Layanan';
        $layanan = Layanan_model::all();
        return view('admin/layanan', compact('idmodal', 'title', 'pages', 'layanan'));
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
                // 'deskripsi' => 'required',
                // 'file' => 'required',
            ],
            [
                'judul.required' => 'The Judul field is required.',
                // 'deskripsi.required' => 'The Deskripsi field is required.',
                // 'file.required' => 'The Gambar field is required.',
            ]
        );

        //check if validation fails
        if ($validator->passes()) {
            if ($request->hasfile('file')) {

                $gambar = $request->file('file');
                $nama = time() . rand(1, 100) . '.' . $gambar->extension();
                $gambar->move(public_path('uploads/fotoKades'), $nama);

                // insert to db
                $layanan = Layanan_model::create([
                    'jenis' => $request->jenis,
                    'judul' => $request->judul,
                    'deskripsi' => $request->deskripsi,
                    'gambar' => $nama,
                ]);

            } else {
                // insert to db
                $layanan = Layanan_model::create([
                    'jenis' => $request->jenis,
                    'judul' => $request->judul,
                    'deskripsi' => $request->deskripsi,
                    'gambar' => null,
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
        $layanan = Layanan_model::find($id);

        return response()->json([
            'success' => true,
            'data'    => $layanan
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
                // 'edit_jenis' => 'required|not_in:0',
                'edit_judul' => 'required',
                // 'edit_deskripsi' => 'required',
                // 'edit_file' => 'required',
            ],
            [
                'edit_judul.required' => 'The Judul field is required.',
                // 'edit_deskripsi.required' => 'The Deskripsi field is required.',
                // 'edit_file.required' => 'The Gambar field is required.',
            ]
        );

        //check if validation fails
        if ($validator->passes()) {
            $layanan = Layanan_model::findOrFail($id);

            if($request->file('edit_file') == "") {

                $layanan->update([
                    'jenis' => $request->edit_jenis,
                    'judul' => $request->edit_judul,
                    'deskripsi' => $request->edit_deskripsi,
                    'gambar' => null,
                ]);

            } else {
                //hapus old image
                unlink(public_path('uploads/fotoKades/').$layanan->gambar);

                //upload new image
                $gambar = $request->file('edit_file');
                $nama = time() . rand(1, 100) . '.' . $gambar->extension();
                $gambar->move(public_path('uploads/fotoKades'), $nama);

                $layanan->update([
                    'jenis' => $request->edit_jenis,
                    'judul' => $request->edit_judul,
                    'deskripsi' => $request->edit_deskripsi,
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
        $layanan = Layanan_model::findOrFail($id);

        //hapus old image
        if (!empty($layanan->gambar)) {
            unlink(public_path('uploads/fotoKades/').$layanan->gambar);
        }

        Layanan_model::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Hapus data!',
            // 'data'    => $post
        ]);
    }
}
