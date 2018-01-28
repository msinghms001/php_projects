<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class msgValidator extends Controller
{
    public function index(Request $req){
    	$message = htmlspecialchars($req->msg." ");

    	$sendingTO = $req->richness;


    	$messageFromId=$req->session()->get('id');


    	DB::statement("insert into receivedmsgby".$sendingTO." ( messageFromId,message,dateTime)".
    		" values ('".$messageFromId."' , '".$message."' , now() ) ");




    	return $message;


    }
}
