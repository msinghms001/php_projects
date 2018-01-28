<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Friend;
use App\User;
use Auth;
use DB;
class friendsController extends Controller
{
	public function index(Request $request){
	//abort(501, 'Feature not implemented');
		if(Auth::check()){
			/*
			$friends=User::where('id','!=',$request->session()->get('id'))->get();
			return response(view('pages.friendsView')->with('friends',$friends))->withHeaders(["Cache-Control"=>"no-store, no-cache, must-revalidate,max-age=0,post-check=0, pre-check=0",]);
			*/
			$friends=DB::select("select user_two_id from friends where user_one_id=".$request->session()->get('id'));
			$tohide=array();
			foreach ($friends as $friend) {
				array_push($tohide,$friend->user_two_id);
			}
			array_push($tohide, $request->session()->get('id'));
			$people=DB::table('users')
			                    ->whereNotIn('id', $tohide)
			                    ->get();
			return response(view('pages.peopleView')->with('people',$people))->withHeaders(["Cache-Control"=>"no-store, no-cache, must-revalidate,max-age=0,post-check=0, pre-check=0",]);
	}
		//return $request->session()->get('id');
	}
	public function storing(Request $request)
	{

	if(Auth::check()){
		$this->validate($request,[
			'whois'=>'required',
			'id'=>'required'
			]);

		$friend = new Friend;
		$friend->user_one_id=$request->whois;
		$friend->user_two_id=$request->id;
		$friend->save();

		return "true";
	}

	}
	public function showmyfriends($id){

//		$friends=DB::select("select * from friends where user_one_id=".$id." or user_two_id=".$id);

//		$friends=DB::select("select name from users, friends where (user_one_id=".$id." or user_two_id=".$id.") and users.id=user_two_id");
  
	//	 return response($friends)->header('Content-Type', "application/json");

/*28 Jan 2018*/



DB::statement("create view friendsViewof".$id." as SELECT (case when (user_one_id=".$id." and user_two_id!=0)THEN user_two_id ELSE IF( user_two_id=".$id." , user_one_id, 0 ) END) as fid from friends");



$friends=DB::select("select friendsViewof".$id.".fid, users.name from users, friendsViewof".$id." where friendsViewof".$id.".fid=users.id");


DB::statement("drop view friendsViewof".$id);



/*    */

		
		 return response($friends)->withHeaders([
                "Cache-Control"=>"no-store, no-cache, must-revalidate, max-age=0,post-check=0, pre-check=0",
                "Pragma"=>"no-cache",
            ]);
  
	}
    
}
