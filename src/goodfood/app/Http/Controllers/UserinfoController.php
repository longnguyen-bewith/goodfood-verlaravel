<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;
class UserinfoController extends Controller
{
public function __construct()
{
$this->middleware('auth');
}
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
//
return view('userinfo');
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
public function edit()
{
//
return view('updateuserinfo');
}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/

public function signedstore()
{
//
		$uid = Auth::user()->id;
        $sql    = "SELECT count(*) times FROM `store` WHERE uid=$uid";
        $times   = DB::select($sql);
        $sql    = "SELECT *  FROM `store` WHERE uid=$uid";
        $store   = DB::select($sql);

        return view('signedstore',compact('times','store'));
	
}
public function update(Request $request)
{
$data = $request->validate([
'email' => ['required', 'string', 'email', 'max:255', 'unique:users,id,' . $request->id ],
'password' => ['required', 'string', 'min:8', 'confirmed'],
]);
$user = User::find($request->id );
        $user->update([
            'email' => $request->email,
            'password'=> Hash::make($request->password),
        ]);
return redirect('/userinfo')->with('status', 'パスワード変更しました!');
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