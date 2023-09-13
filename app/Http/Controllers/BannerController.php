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
                // foreach ($request->file('filenames') as $file) {
                //     $name = time() . rand(1, 100) . '.' . $file->extension();
                //     // $file->move(public_path('files'), $name);
                //     Image::make($file)->resize(850, null, function ($constraint) {
                //         $constraint->aspectRatio();
                //     })->save(public_path('files/' . $name));

                //     $files[] = $name;
                //     // $namaFiles[] = $request->namaFile;
                // }

                // $CreateAttachment = Attachment_model::create([
                //     'id_customer'   => $request->id_customer,
                //     'files'         => implode(",",$files),
                //     'nama_files'    => implode(",",$request->namaFile),
                //     'ar'            => $request->ar,
                //     'created_date'  => $request->created_date,
                //     'created_by'    => $request->ar,
                // ]);

                $data = $request->file('file');
                dd($data);
            }

            // insert to db
            $Banner = Banner_model::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
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
