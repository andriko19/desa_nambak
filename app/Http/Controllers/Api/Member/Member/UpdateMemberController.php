<?php

namespace App\Http\Controllers\Api\Member\Member;

use App\Models\Member_model;
use App\Http\Resources\MemberResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\File;
// use Illuminate\Http\Request;

class UpdateMemberController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function update(Request $request)
    {
        $datauser =  DB::select('select * from users where id = ' . $request->id);
        // dd($datauser[0]);

        $input = $request->all();
        $userid = $request->id;
        // dd($userid);
        // $userid = Auth::guard('api')->user()->id;
        $rules = array(
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        );
        $validator = Validator::make($input, $rules);

        // dd($request->old_password);
        if ($validator->fails()) {
            //dd("fails");
            $arr = array("status" => 400, "message" => $validator->errors()->first(), "data" => array());
        } else {
            //dump("not fails");
            try {
                if ((Hash::check(request('old_password'), $datauser[0]->password)) == false) {
                    //dd("condition 1");
                    $arr = array("status" => 400, "message" => "Check your old password.", "data" => array());
                } else if ((Hash::check(request('new_password'), $datauser[0]->password)) == true) {
                    //dd("condition 2");
                    $arr = array("status" => 400, "message" => "Please enter a password which is not similar then current password.", "data" => array());
                } else {
                    //dd("condition 3");
                    User::where('id', $userid)->update(['password' => Hash::make($input['new_password'])]);
                    $arr = array("status" => 200, "message" => "Password updated successfully.", "data" => array());
                }
                //dd("mlaku gaes");
            } catch (\Exception $ex) {
                //dd("catch fails");
                if (isset($ex->errorInfo[2])) {
                    $msg = $ex->errorInfo[2];
                } else {
                    $msg = $ex->getMessage();
                }
                $arr = array("status" => 400, "message" => $msg, "data" => array());
            }
        }
        return \Response::json($arr);

        $modelmember = Member_model::find($request->id);
        $modelmember->update([
            'email' => $request->email,
            'notelp' => $request->notelp,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'fullname' => $request->fullname,
            'nickname' => $request->nickname,
            'website' => $request->website,
            'company' => $request->company,
            'gambar' => $request->gambar,
            'alamat' => $request->alamat,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'negara' => $request->negara,
            'kodenegara' => $request->kodenegara,
            'kodepos' => $request->kodepos,
            'setujunews' => $request->setujunews,
            'saldoredem' => $request->saldoredem,
            'poin' => $request->poin,
            'idmembershipsky' => $request->idmembershipsky,
            'referralcode' => $request->referralcode,
            'lahirtgl' => $request->lahirtgl,
            'statusmembership' => $request->statusmembership,
            'infodari' => $request->infodari,
            'registerdate' => $request->registerdate,
            'status' => $request->status,
            'deleted' => $request->deleted,
        ]);

        return new MemberAddressResource($modelmemberaddress);
    }


    public function updateimage(Request $request)
    {

        date_default_timezone_set('Asia/Jakarta');
        $dateymd = date('Y-m-d');
        $datedmy = date('d-m-Y');
        $tglhariini = date('Y-m-d');
        $jamhis = date('H:i:s');
        $jamhi = date('H:i');
        $day = date('d');
        $year = date('Y');

        $gambar = $request->gambar;
        $tglsubmit =  $tglhariini;

        $iduser = $request->idmembers;

        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:jpg,png,jpeg,doc,docx,pdf,txt,csv|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }


        if ($file = $request->file('file')) {
            // $name = $file->getClientOriginalName();
            $name = $request->filename.".".$file->clientExtension();;
            $request->file->move(public_path('uploads'), $name);
            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => $file
            ]);
        }


        return response()->json([
            "success" => true,
            "message" => "File un successfully uploaded",
            "file" => $file
        ]);
    }
}