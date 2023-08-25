<?php
/**
 * author : Suryo Atmojo <suryoatm@gmail.com>
 * project : Supresso Laravel
 * Start-date : 19-09-2022
 */

namespace App\Http\Controllers\Member;

use App\Models\Member_model;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;

use App\Models\User;


use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Vend\VendController;

class MemberPointController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       #get data member web dari database
        $resmember_models =  DB::table('member_models')
            ->get();
  
        #restructur data, mencari status vend apakah memebr web sudah ada di vend atau belum
        $dataMember = [];
        for ($i = 0; $i < count($resmember_models); $i++) {
            $dataMember = $resmember_models;

            if ($resmember_models[$i]->id_users_login !=null) {
                $res_order_member = DB::select("SELECT * from order_models where iduser =".$resmember_models[$i]->id_users_login);
           
                $res_log_redeem = DB::select('select mrl.id,mrl.created_at as tanggalredeem, mrl.iduser,mrl.idproduct_redeem, pm.product_name as namaproduk,
                ((select SUM(om.itemsubtotal)  from member_models as mm
    inner JOIN order_models as om on mm.id = om.iduser
    where om.status="complete" and DATE(om.tanggalorder) <= DATE(mrl.created_at)  and mm.id_users_login = mrl.iduser) 
                -
                (select IFNULL(SUM(mrlg.member_point_redeem),0) from member_redeem_log_models as mrlg where mrlg.iduser = mrl.iduser and  DATE(mrlg.created_at) < DATE(mrl.created_at))
                )
                as total_point,
                mrl.member_point_redeem,
    -- 						(select IFNULL(SUM(mrlg.member_point_redeem),0) from member_redeem_log_models as mrlg where  DATE(mrlg.created_at) < DATE(mrl.created_at)) as historyredeempoint,
                ((select SUM(om.itemsubtotal)  from member_models as mm
    inner JOIN order_models as om on mm.id = om.iduser
    where om.status="complete" and DATE(om.tanggalorder) <= DATE(mrl.created_at)  and mm.id_users_login = mrl.iduser)
                -
                (select SUM(mrlog.member_point_redeem) from member_redeem_log_models as mrlog where mrlog.iduser = mrl.iduser and  DATE(mrlog.created_at) <= DATE(mrl.created_at))) as finalpoint
                from member_redeem_log_models as mrl 
                LEFT JOIN product_models as pm on pm.id = mrl.idproduct_redeem
                where mrl.iduser = ' . $resmember_models[$i]->id_users_login . ' order by DATE(mrl.created_at) asc');
    
                $totaluserredeem = 0;
    
                for ($sr = 0; $sr < count( $res_log_redeem); $sr++) {
                    $totaluserredeem = $totaluserredeem +  $res_log_redeem[$sr]->member_point_redeem;
                }
    
                if ($totaluserredeem <> 0) {
                    $totalpoint = floor( $res_log_redeem[count( $res_log_redeem) - 1]->finalpoint);
                    
                } else {
                    ##query tanpa order dari vend
                // $totalpoint = floor(DB::select('select SUM(odm.subtotalproduk) as totalpoint  from member_models as mm
                // inner JOIN order_models as om on mm.id = om.iduser
                // inner JOIN order_detail_models as odm on om.nomerorder = odm.nomerorder
                // where om.status="complete" and mm.id_users_login = ' . $userId)[0]->totalpoint);
                    ##query dengan vend
                $totalpoint = floor(DB::select('select SUM(om.itemsubtotal) as totalpoint  from order_models as om where om.status="complete" and om.iduser = ' . $resmember_models[$i]->id_users_login)[0]->totalpoint);
    
                // dump("test2");
                }
                if ($totalpoint < 300) {
                    $caption = 'Robusta';
                } else {
                    $caption = 'Arabica';
                }
                
                $dataMember[$i]->order = $res_order_member;
                $dataMember[$i]->totaluserredeem = $totaluserredeem;
                $dataMember[$i]->totalpoint = $totalpoint;
                $dataMember[$i]->captionpoint = $caption;
            }
            else{
                $dataMember[$i]->order = [];
                $dataMember[$i]->totaluserredeem = 0;
                $dataMember[$i]->totalpoint = 0;
                $dataMember[$i]->captionpoint = "unidentified";
            } 
        }

        $member_models =  $dataMember;
        // dd($member_models[0]);
      
        return view('members/pointmember', compact('member_models'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

}
