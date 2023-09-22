<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;
use App\Models\DataInformasi_model;

class DataInformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idmodal = 'DataInformasi';
        $title = 'Data dan Informasi';
        $pages = 'List Data dan Informasi';
        $data_informasi = DataInformasi_model::all();
        $tags = DB::table('tbl_tag')->get();
        return view('admin/data_informasi', compact('idmodal', 'title', 'pages', 'data_informasi', 'tags'));
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
                'isi_data_informasi' => 'required',
                'tag' => 'required|not_in:0',
                'file' => 'required',
            ],
            [
                'jenis.required' => 'The Jenis field is required.',
                'judul.required' => 'The Judul field is required.',
                'isi_data_informasi.required' => 'The Deskripsi field is required.',
                'tag.required' => 'The Tag field is required.',
                'file.required' => 'The Gambar field is required.',
            ]
        );

        //check if validation fails
        if ($validator->passes()) {
            if ($request->hasfile('file')) {

                $gambar = $request->file('file');
                $nama = time() . rand(1, 100) . '.' . $gambar->extension();
                $gambar->move(public_path('uploads/dataInformasi'), $nama);

                // insert to db
                $data_informasi = DataInformasi_model::create([
                    'jenis' => $request->jenis,
                    'judul' => $request->judul,
                    'isi_data_informasi' => $request->isi_data_informasi,
                    'tag' => implode(",",$request->tag),
                    'gambar' => $nama,
                ]);

            } else {
                // insert to db
                $data_informasi = DataInformasi_model::create([
                    'jenis' => $request->jenis,
                    'judul' => $request->judul,
                    'isi_data_informasi' => $request->isi_data_informasi,
                    'tag' => implode(",",$request->tag),
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
        $data_informasi = DataInformasi_model::find($id);

        return response()->json([
            'success' => true,
            'data'    => $data_informasi
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
                'edit_isi_data_informasi' => 'required',
                'edit_tag' => 'required|not_in:0',
                // 'file' => 'required',
            ],
            [
                'edit_jenis.required' => 'The Jenis field is required.',
                'edit_judul.required' => 'The Judul field is required.',
                'edit_isi_data_informasi.required' => 'The Deskripsi field is required.',
                'edit_tag.required' => 'The Tag field is required.',
                // 'file.required' => 'The Gambar field is required.',
            ]
        );

        //check if validation fails
        if ($validator->passes()) {
            $data_informasi = DataInformasi_model::findOrFail($id);

            if($request->file('edit_file') == "") {

                $data_informasi->update([
                    'jenis' => $request->edit_jenis,
                    'judul' => $request->edit_judul,
                    'isi_data_informasi' => $request->edit_isi_data_informasi,
                    'tag' => implode(",",$request->edit_tag),
                    'gambar' => null,
                ]);

            } else {
                //hapus old image
                unlink(public_path('uploads/dataInformasi/').$data_informasi->gambar);

                //upload new image
                $gambar = $request->file('edit_file');
                $nama = time() . rand(1, 100) . '.' . $gambar->extension();
                $gambar->move(public_path('uploads/dataInformasi'), $nama);

                $data_informasi->update([
                    'jenis' => $request->edit_jenis,
                    'judul' => $request->edit_judul,
                    'isi_data_informasi' => $request->edit_isi_data_informasi,
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
        $data_informasi = DataInformasi_model::findOrFail($id);

        //hapus old image
        if (!empty($data_informasi->gambar)) {
            unlink(public_path('uploads/dataInformasi/').$data_informasi->gambar);
        }

        DataInformasi_model::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Hapus data!',
            // 'data'    => $post
        ]);
    }
}
