<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;

class registerController extends Controller
{

    public function index(){


    return view('pages.registerUser');  

    }


    public function register(Request $req){


    }

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
            $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'password-confirm'=>'required'
            ]);
            $user=new User;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=bcrypt($request->password);
            $user->save();
            $id=DB::select("select id from users where email='".$request->email."'");
            

            Schema::dropIfExists('receivedMsgBy'.$id[0]->id);

            Schema::create('receivedMsgBy'.$id[0]->id, function ($table) {
            


            $table->increments('msg_id');
            $table->string('messageFromId');
            $table->string('message');
            $table->dateTime('dateTime');
            $table->timestamps();
        });
            return $id[0]->id;
         
    }

    /**
     * Display the specified resource.
     *
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
                $user=User::find($id);
                $user->delete();
                return redirect('/')->with('success','Post deleted!');


    }
}
