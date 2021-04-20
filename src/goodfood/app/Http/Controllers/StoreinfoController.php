<?php
namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreinfoController extends Controller
{
    public function __construct()
    {
        $this->
            middleware('auth');
    }
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function index(Request $request,$id)
    {
//
        $page = $request->page ?? 0;
        $sql    = "SELECT * FROM `store` WHERE sid=$id";
        $data   = DB::select($sql);
        $sql    = "SELECT role FROM `role` WHERE sid=$id";
        $data2  = DB::select($sql);
        $sql    = "SELECT COUNT(*) sum FROM `storelike` WHERE sid=$id";
        $like   = DB::select($sql);
        $sql    = "SELECT  IFNULL(ROUND(AVG(votes),1),0) vote , COUNT(votes) sum FROM `storecmt` RIGHT JOIN store USING(sid) WHERE sid=$id GROUP BY sid";
        $vote   = DB::select($sql);
        $sql    = "SELECT  u.name,c.uid ,votes,cmt, c.created_at,cid  FROM `storecmt`  c  JOIN store  s USING(sid)   JOIN users u ON c.uid=u.id WHERE sid=$id ORDER BY c.created_at DESC LIMIT 5 OFFSET ".$page*5  ;
        $cmt    = DB::select($sql);
        $uid    = Auth::user()->id;
        $sql    = "SELECT sid FROM `storelike` WHERE sid=$id AND $uid=uid";
        $islike = DB::select($sql);
        return view('storeinfo', compact('data', 'data2', 'vote', 'like', 'cmt', 'islike', 'id','page'));
        //return $islike;
    }

     public function editstore(Request $request)
    {
//
        $id=$request->sid;
        $sql    = "SELECT * FROM `store` WHERE sid=$id";
        $store   = DB::select($sql);
        $sql    = "SELECT role FROM `role` WHERE sid=$id";
        $data  = DB::select($sql);
        return view('editstore', compact('data', 'store'));
        //return $islike;
    }

    public function like($id, $like)
    {
//
        $uid = Auth::user()->id;
        if ($like === "like") {
            $sql  = "INSERT INTO `storelike`(`uid`, `sid`) VALUES ($uid,$id)";
            $data = DB::insert($sql);
        } else {
            $sql  = "DELETE FROM `storelike` WHERE sid=$id AND $uid=uid";
            $data = DB::delete($sql);
        }
        return redirect('/storeinfo/' . $id);
        //return $cmt;
    }

     public function delcmt(Request $request)
    {
//      
        if((file_exists(public_path('img/'.$request->cid)))){
        unlink(public_path('/img/'.$request->cid));
        }
        $sql  = "DELETE FROM `storecmt` WHERE cid=$request->cid";
        $data = DB::delete($sql);
        return redirect('/cmtedstore');
        //return $cmt;
    }

        public function delstore(Request $request)
    {
//      
        $sql  = "DELETE FROM `store` WHERE sid=$request->sid";
        $data = DB::delete($sql);
        $sql  = "DELETE FROM `storelike` WHERE sid=$request->sid";
        $data = DB::delete($sql);
        $sql  = "DELETE FROM `role` WHERE sid=$request->sid";
        $data = DB::delete($sql);
        $sql  = "DELETE FROM `storecmt` WHERE sid=$request->sid";
        $data = DB::delete($sql);
        return redirect('/signedstore');
        //return $cmt;
    }

    public function cmtstore(Request $request)
    {
//
        $uid = Auth::user()->id;
        $data = $request->validate([
            'point'    => ['required'],
            'comment' => ['required'],
        ]);
        if($request->image){
        $data = $request->validate([
            'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ]);
        }
        
        $time=now();

        $sql  = "INSERT INTO `storecmt`(`uid`, `sid`, `cmt`, `votes`, `created_at`) VALUES ($uid,$request->sid,'$request->comment ',$request->point,now())";

        $cmt= DB::insert($sql);
        if($request->image){
        $cmtid = DB::getPdo()->lastInsertId();
        $request->image->move(public_path('img'), $cmtid);
        }

        return redirect('/storeinfo/' . $request->sid);
    }

     public function signstore(Request $request)
    {
//
        $uid = Auth::user()->id;
        $data = $request->validate([
        'storename' => ['required','string','max:255','unique:store'],
        'address' => ['required','string','max:255'],
        'opentime' => ['required'],
        'closetime' => ['required'],
         '和食'=>['required_without_all:カフェ,その他,麺料理,中華料理,洋食,焼肉'],

        ]);
         $sql  = "INSERT INTO `store`(`uid`,`storename`, `address`, `opentime`, `closetime`, `created_at`) VALUES ($uid,'$request->storename','$request->address','$request->opentime','$request->closetime',now())";
        $db = DB::insert($sql);
        $sid = DB::getPdo()->lastInsertId();
        $role=["和食","洋食","中華料理","焼肉","麺料理","カフェ","その他"];
        foreach($role as $in){
            if($request->input($in)){
            $sql="INSERT INTO `role`(`sid`, `role`) VALUES ($sid,'$in')";
            $db = DB::insert($sql);
            }
        }

        
        return redirect('/storeinfo/' . $sid);
       
    }

     public function confirmeditstore(Request $request)
    {
//
        $uid = Auth::user()->id;
        $data = $request->validate([
        'address' => ['required','string','max:255'],
        'opentime' => ['required'],
        'closetime' => ['required'],
         '和食'=>['required_without_all:カフェ,その他,麺料理,中華料理,洋食,焼肉'],

        ]);
         $sql  = "UPDATE `store` SET `address`='$request->address',`opentime`='$request->opentime',`closetime`='$request->closetime',`updated_at`= now() WHERE $request->sid=sid";
         $db = DB::update($sql); 
         $sql  = "DELETE FROM `role` WHERE sid=$request->sid";
        $data = DB::delete($sql);
        $role=["和食","洋食","中華料理","焼肉","麺料理","カフェ","その他"];
        foreach($role as $in){
            if($request->input($in)){
            $sql="INSERT INTO `role`(`sid`, `role`) VALUES ($request->sid,'$in')";
            $db = DB::insert($sql);
            }
        }
        return redirect('/storeinfo/' . $request->sid);
       
    }
        public function showsignstore()
    {
//  
        return view('signstore');
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
//
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
