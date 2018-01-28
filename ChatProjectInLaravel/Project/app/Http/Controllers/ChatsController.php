<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Chat;
use App\User;

use Auth;
use DB;
class ChatsController extends Controller
{



        public function homelogin(Request $request){

            if(Auth::check()){
                return redirect('chat/show/'.$request->session()->get('id'));
            }
            else
                return response(view('pages.homewelcome'))->withHeaders(["Cache-Control"=>"no-store, no-cache, must-revalidate,max-age=0,post-check=0, pre-check=0",]);

        }

    public function index(Request $request)
    {


        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'

            ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
            {
                $user=User::where('email',$request->email)->first();
     //$request->session()->put('usermail', $user->email);
      session(['usermail'=>$user->email,'id'=>$user->id]);
              return redirect('chat/show/'.$user->id);

            }
        else 
            return redirect('/')->with('msg','failsed'); 
    }

 
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        //
    }

    public function fetchmessages(Request $req){




//$chatMessages=DB::select('select message,messageFromId from receivedmsgby3');
/*

                $chatMessages=DB::select('select receivedmsgby3.dateTime,receivedmsgby1.dateTime receivedmsgby3.message,  receivedmsgby1.message from receivedmsgby3,receivedmsgby1 order by receivedmsgby3.dateTime,receivedmsgby1.dateTime');
*/
$chatMessages=DB::select("select * FROM receivedmsgby3,receivedmsgby1 ");

        return response($chatMessages);



    }

    public function show(Request $request,$id)
    {
        if($request->session()->has('usermail')){
            $user=User::findorFail($request->session()->get('id'));
           
            if($user->email!==$request->session()->get('usermail')){
                redirect('chat/show/'.$request->session()->get('id'));
            }

                $chatMessages=Chat::all();

            return response(view("pages.dashboard")->with(['user'=>$user,
                                                            'chatMessages'=>$chatMessages

                        ]))->withHeaders(["Cache-Control"=>"no-store, no-cache, must-revalidate,max-age=0,post-check=0, pre-check=0",]);  
        }
        else
            return redirect('/')->with('msg','please login to access this facility'); 

    }

    public function edit(Request $req,$id)
    {
        return($req->session()->all());

    }

  
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
    public function logout(Request $request){
        if($request->session()->has('usermail')){

            $request->session()->flush();
            return redirect('/')->with('msg',$request->session()->all()); 
        }

        else
            return redirect('/')->with('msg','Login first!'); 


    }
}
