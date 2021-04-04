<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {   
        $sql    = "SELECT sid FROM `store`  JOIN `users` ON id=uid WHERE (storename like '%$request->key%' OR name like '%$request->key%')";
        

        //checkbox
        $role=["和食","洋食","中華料理","焼肉","麺料理","カフェ","その他"];
        foreach($role as $in){
            if($request->input($in)){
                $check[]=$in;
            }
        }
        if(isset($check)){
            if($request->isor==1){
           $c= "('".implode("','",$check)."')";
            $sql.=" AND sid in (SELECT sid FROM `role` where role in  $c )";
        }else{
            foreach($check as $c){
                $sql.=" AND sid in (SELECT sid FROM `role` where role = '$c' )";
            }
        }
        }

        //select 
        if(!$request->sec || $request->sec==1){
            $sql.="ORDER BY storename";
        }
        if($request->sec==2){
            $sql="SELECT  IFNULL(ROUND(AVG(votes),1),0) vote , COUNT(votes) sum ,sid FROM `storecmt` RIGHT JOIN store USING(sid)  GROUP BY sid 
            HAVING sid in"."($sql) ORDER BY vote DESC";
        }

        if($request->sec==3){
            $sql="SELECT COUNT(a.uid) sum,sid from `storelike` a RIGHT JOIN store b USING(sid) GROUP BY sid HAVING sid in"."($sql) ORDER BY sum DESC";
        }
         
        

        $takesid   = DB::select($sql);
        $numberofid = count($takesid);
        
        foreach( $takesid as $order){
        $sql    = "SELECT * FROM `store`  JOIN `users` ON id=uid WHERE $order->sid=sid";
        $store[]   = DB::select($sql);
        $sql    = "SELECT COUNT(*) sum from `storelike` WHERE $order->sid=sid";
        $like[]   = DB::select($sql);
        $sql    = "SELECT  IFNULL(ROUND(AVG(votes),1),0) vote , COUNT(votes) sum FROM `storecmt` RIGHT JOIN store USING(sid) WHERE $order->sid=sid GROUP BY sid";
        $vote[]   = DB::select($sql);
       $sql    = "SELECT role AS s FROM `role` WHERE $order->sid=sid";
        $type[] = DB::select($sql);
        }
        if($numberofid>0){
        return view('home',compact('numberofid','store','like','vote','type','request'));
        //return $takesid;
        }else{
        return view('home',compact('numberofid','request'));
        }
        
    }
}
