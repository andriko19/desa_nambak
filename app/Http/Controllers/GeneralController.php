<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\General_model;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Auth;

class GeneralController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    // public function index()
    {

        $data = General_model::join("users","users.id","=","general_informations.ar")
            ->orderBy('general_informations.id','desc')
            ->get(['*', 'general_informations.id as id_general']);
        return view('general.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        // $roles = Role::pluck('name','name')->all();
        $data = General_model::orderBy('id','desc')->get();
        // dump($data[0]->id);
        // die;
        return view('general.create',compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            // 'id_customer'   => 'required',
            'type_usaha'    => 'required|not_in:0',
            'nama_usaha'    => 'required',
            'nama_lengkap'  => 'required',
            'jabatan'       => 'required',
            'telepon'       => 'required',
            'mobile_phone'  => 'required',
            'email'         => 'required|email|unique:general_informations,email',
            'web_site'      => 'required',
            'no_npwp'       => 'required',
            'nama_npwp'     => 'required',
            'alamat_npwp'   => 'required',
            'nik'           => 'required',
            'ar'            => 'required',
        ]);

        $huruf = substr($request->nama_usaha,0,3);
        $data = General_model::orderBy('id','desc')->get(['general_informations.id as id_general']);
        $urutan = $data[0]->id_general;
        $urutan++;
        $id_customer = $huruf ."-". sprintf("%03s", $urutan);

        // dump($id_customer);
        // dump($urutan);
        // die;

        $data = General_model::create([
            'id_customer' => $id_customer,
            'type_usaha' => $request->type_usaha,
            'nama_usaha' => $request->nama_usaha,
            'nama_lengkap' => $request->nama_lengkap,
            'jabatan' => $request->jabatan,
            'telepon' => $request->telepon,
            'mobile_phone' => $request->mobile_phone,
            'email' => $request->email,
            'web_site' => $request->web_site,
            'no_npwp' => $request->no_npwp,
            'nama_npwp' => $request->nama_npwp,
            'alamat_npwp' => $request->alamat_npwp,
            'nik' => $request->nik,
            'ar' => $request->ar,
            'created_date' => date("Y-m-d"),
            'created_by' => $request->ar,
            'update_date' => "null",
            'update_time' => "null",
            'update_by' => "null",
        ]);

        if ($data) {
            return redirect()
                ->route('generals.index')
                ->with([
                    'success' => 'New general information has been created'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    public function destroy($id)
    {
        General_model::find($id)->delete();
        return redirect()->route('generals.index')
                        ->with('success','General deleted successfully');
    }

    public function atribut()
    {
        // $roles = Role::pluck('name','name')->all();
        return view('general.atribut');
    }
}
