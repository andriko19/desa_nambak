<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Berita_model;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idmodal = 'Berita';
        $title = 'Berita';
        $pages = 'List Berita';
        $berita = Berita_model::all();
        return view('admin/berita', compact('idmodal', 'title', 'pages', 'berita'));
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
                'judul' => 'required',
                'isi_berita' => 'required',
                'tag' => 'required|not_in:0',
                'file' => 'required',
            ],
            [
                'judul.required' => 'The Judul field is required.',
                'isi_berita.required' => 'The Deskripsi field is required.',
                'tag.required' => 'The Tag field is required.',
                'file.required' => 'The Gambar field is required.',
            ]
        );

        //check if validation fails
        if ($validator->passes()) {
            if ($request->hasfile('file')) {

                $gambar = $request->file('file');
                $nama = time() . rand(1, 100) . '.' . $gambar->extension();
                $gambar->move(public_path('uploads/berita'), $nama);

                // insert to db
                $berita = Berita_model::create([
                    'judul' => $request->judul,
                    'isi_berita' => $request->isi_berita,
                    'tag' => implode(",",$request->tag),
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
        $berita = Berita_model::find($id);

        return response()->json([
            'success' => true,
            'data'    => $berita
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
                'edit_judul' => 'required',
                'edit_isi_berita' => 'required',
                'edit_tag' => 'required|not_in:0',
                'edit_file' => 'required',
            ],
            [
                'edit_judul.required' => 'The Judul field is required.',
                'edit_isi_berita.required' => 'The Deskripsi field is required.',
                'edit_file.required' => 'The Gambar field is required.',
            ]
        );

        //check if validation fails
        if ($validator->passes()) {
            $berita = Berita_model::findOrFail($id);

            if($request->file('edit_file') == "") {

                $berita->update([
                    'judul' => $request->edit_judul,
                    'isi_berita' => $request->edit_isi_berita,
                    'tag' => implode(",",$request->edit_tag),
                ]);

            } else {
                //hapus old image
                unlink(public_path('uploads/berita/').$berita->gambar);

                //upload new image
                $gambar = $request->file('edit_file');
                $nama = time() . rand(1, 100) . '.' . $gambar->extension();
                $gambar->move(public_path('uploads/berita'), $nama);

                $berita->update([
                    'judul' => $request->edit_judul,
                    'isi_berita' => $request->edit_isi_berita,
                    'tag' => implode(",",$request->edit_tag),
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
        $berita = Berita_model::findOrFail($id);
        //hapus old image
        unlink(public_path('uploads/berita/').$berita->gambar);

        Berita_model::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Hapus data!',
            // 'data'    => $post
        ]);
    }
}
