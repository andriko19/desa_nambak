<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Tag_model;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idmodal = 'Tag';
        $title = 'Tag';
        $pages = 'List Tag';
        $tag = Tag_model::all();
        return view('admin/tag', compact('idmodal', 'title', 'pages', 'tag'));
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
                'link' => 'required',
            ],
            [
                'judul.required' => 'The Judul field is required.',
                'link.required' => 'The Link field is required.',
            ]
        );

        //check if validation fails
        if ($validator->passes()) {
            // insert to db
            $tag = Tag_model::create([
                'judul' => $request->judul,
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
        $tag = Tag_model::find($id);

        return response()->json([
            'success' => true,
            'data'    => $tag
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
                'edit_link' => 'required',
            ],
            [
                'edit_judul.required' => 'The Judul field is required.',
                'edit_link.required' => 'The Link field is required.',
            ]
        );

        //check if validation fails
        if ($validator->passes()) {
            $tag = Tag_model::findOrFail($id);

            $tag->update([
                'judul' => $request->edit_judul,
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
        Tag_model::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Hapus data!',
            // 'data'    => $post
        ]);
    }
}
