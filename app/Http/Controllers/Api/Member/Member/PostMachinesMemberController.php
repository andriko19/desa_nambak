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

class PostMachinesMemberController extends Controller
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

    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $dateymd = date('Y-m-d');
        $datedmy = date('d-m-Y');
        $tglhariini = date('Y-m-d');
        $jamhis = date('H:i:s');
        $jamhi = date('H:i');
        $day = date('d');
        $year = date('Y');

        $email = $request->email;

        $machinesSN=$request->machinesSN;
        $machinesOutletName=$request->machinesOutletName;
        $machinesCity=$request->machinesCity;
        $machinesDatePurchase=$request->machinesDatePurchase;
        $file=$request->file;
        $filename=$request->email;

       
        // // $gambar = $request->gambar;
        // $tglsubmit =  $tglhariini;

        // $iduser = $request->idmembers;

        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:jpg,png,jpeg,doc,docx,pdf,txt,csv|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }




        if ($file = $request->file('file')) {
           
            $name = $filename.".".$file->clientExtension();
            $request->file->move(public_path('uploads'), $name);
            // return response()->json([
            //     "success" => true,
            //     "message" => "File successfully uploaded",
            //     "file" => $file
            // ]);

            $query = 'INSERT INTO member_machines (email,serial_number,outlet_name,city,datepurchase,file_invoice,created_at,updated_at
            ) VALUES ("'.$machinesSN.'","'.$machinesOutletName.'","'.$machinesCity.'","'.$machinesDatePurchase.'","'.$name.'")';
    
            $postmachines = DB::insert('INSERT INTO member_machines (email,serial_number,outlet_name,city,datepurchase,file_invoice,created_at,updated_at
            ) VALUES ("'.$machinesSN.'","'.$machinesOutletName.'","'.$machinesCity.'","'.$machinesDatePurchase.'","'.$name.'")');
        }

      
if($postmachines)
{
    return response()->json([
        "success" => true,
        "message" => "add machines",
        "file" => $email,
        "sql" => $query
    ]);
}

        
    }


  
}