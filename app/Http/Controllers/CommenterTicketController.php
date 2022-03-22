<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommenterTicketController extends Controller{
    
    function commenterTicket(Request $request){
        if(Auth::guard()->user()){
            //Si l'opérateur est connecter 
            $userid = Auth::guard()->user()->id;
        }
    }



}

?>