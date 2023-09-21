<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Kontak_model;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idmodal = 'Kontak';
        $title = 'Kontak';
        $pages = 'List Kontak';
        $kontak = Kontak_model::all();
        return view('admin/kontak', compact('idmodal', 'title', 'pages', 'kontak'));
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
                // 'hari' => 'required',
                // 'jam' => 'required',
            ],
            [
                'judul.required' => 'The Judul field is required.',
                // 'prakata.required' => 'The Prakata field is required.',
                // 'hari.required' => 'The Hari field is required.',
                // 'jam.required' => 'The Jam field is required.',
            ]
        );

        //check if validation fails
        if ($validator->passes()) {
            // insert to db
            $kontak = Kontak_model::create([
                'jenis' => $request->jenis,
                'judul' => $request->judul,
                'isi_kontak' => $request->isi_kontak,
                'link' => $request->link,
            ]);
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
        $kontak = Kontak_model::find($id);

        return response()->json([
            'success' => true,
            'data'    => $kontak
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
                // 'edit_hari' => 'required',
                // 'edit_jam' => 'required',
            ],
            [
                'edit_judul.required' => 'The Judul field is required.',
                // 'edit_prakata.required' => 'The Prakata field is required.',
                // 'edit_hari.required' => 'The Hari field is required.',
                // 'edit_jam.required' => 'The Jam field is required.',
            ]
        );

        //check if validation fails
        if ($validator->passes()) {
            $kontak = Kontak_model::findOrFail($id);

            $kontak->update([
                'jenis' => $request->edit_jenis,
                'judul' => $request->edit_judul,
                'isi_kontak' => $request->edit_isi_kontak,
                'link' => $request->edit_link,
            ]);

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
        Kontak_model::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Hapus data!',
            // 'data'    => $post
        ]);
    }
}
