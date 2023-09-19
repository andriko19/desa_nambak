<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Testimoni_model;


class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idmodal = 'Testimoni';
        $title = 'Testimoni';
        $pages = 'List Testimoni';
        $testimoni = Testimoni_model::all();
        return view('admin/testimoni', compact('idmodal', 'title', 'pages', 'testimoni'));
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
                // 'jenis' => 'required|not_in:0',
                // 'judul' => 'required',
                // // 'deskripsi' => 'required',
                // 'file' => 'required',
            ],
            [
                // 'judul.required' => 'The Judul field is required.',
                // 'deskripsi.required' => 'The Deskripsi field is required.',
                // 'file.required' => 'The Gambar field is required.',
            ]
        );

        //check if validation fails
        if ($validator->passes()) {
            if ($request->hasfile('file')) {

                $foto = $request->file('file');
                $nama = time() . rand(1, 100) . '.' . $foto->extension();
                $foto->move(public_path('uploads/testimoni'), $nama);

                // insert to db
                $testimoni = Testimoni_model::create([
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'foto' => $nama,
                    'tanggapan' => $request->tanggapan,
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
        //
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
        //
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
