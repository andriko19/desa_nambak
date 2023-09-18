<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\TentangDesa_model;

class TentangDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $idmodal = 'TentangDesa';
        $title = 'Tentang Desa';
        $pages = 'List Tentang Desa';
        $tentang_desa = TentangDesa_model::all();
        return view('admin/tentang_desa', compact('idmodal', 'title', 'pages', 'tentang_desa'));
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
                // 'prakata' => 'required',
                // 'deskripsi' => 'required',
                // 'pertanyaan' => 'required',
                // 'jawaban' => 'required',
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
                $gambar->move(public_path('uploads/tentangDesa'), $nama);

                // insert to db
                $tentang_desa = TentangDesa_model::create([
                    'jenis' => $request->jenis,
                    'judul' => $request->judul,
                    'prakata' => $request->prakata,
                    'deskripsi' => $request->deskripsi,
                    'pertanyaan' => $request->pertanyaan,
                    'jawaban' => $request->jawaban,
                    'gambar' => $nama,
                ]);

            } else {
                // insert to db
                $tentang_desa = TentangDesa_model::create([
                    'jenis' => $request->jenis,
                    'judul' => $request->judul,
                    'prakata' => $request->prakata,
                    'deskripsi' => $request->deskripsi,
                    'pertanyaan' => $request->pertanyaan,
                    'jawaban' => $request->jawaban,
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
        $tentang_desa = TentangDesa_model::find($id);

        return response()->json([
            'success' => true,
            'data'    => $tentang_desa
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
                // 'edit_prakata' => 'required',
                // 'edit_deskripsi' => 'required',
                // 'edit_pertanyaan' => 'required',
                // 'edit_jawaban' => 'required',
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
            $tentang_desa = TentangDesa_model::findOrFail($id);

            if($request->file('edit_file') == "") {

                $tentang_desa->update([
                    'jenis' => $request->edit_jenis,
                    'judul' => $request->edit_judul,
                    'prakata' => $request->edit_prakata,
                    'deskripsi' => $request->edit_deskripsi,
                    'pertanyaan' => $request->edit_pertanyaan,
                    'jawaban' => $request->edit_jawaban,
                    'gambar' => null,
                ]);
        
            } else {
                //hapus old image
                unlink(public_path('uploads/tentangDesa/').$tentang_desa->gambar);
        
                //upload new image
                $gambar = $request->file('edit_file');
                $nama = time() . rand(1, 100) . '.' . $gambar->extension();
                $gambar->move(public_path('uploads/tentangDesa'), $nama);
        
                $tentang_desa->update([
                    'jenis' => $request->edit_jenis,
                    'judul' => $request->edit_judul,
                    'prakata' => $request->edit_prakata,
                    'deskripsi' => $request->edit_deskripsi,
                    'pertanyaan' => $request->edit_pertanyaan,
                    'jawaban' => $request->edit_jawaban,
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
        $tentang_desa = TentangDesa_model::findOrFail($id);
        
        //hapus old image
        if (!empty($tentang_desa->gambar)) {
            unlink(public_path('uploads/tentangDesa/').$tentang_desa->gambar);
        }
        
        TentangDesa_model::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Hapus data!',
            // 'data'    => $post
        ]);
    }
}
