<?php

namespace App\Http\Controllers;

use App\Models\Notif;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function displayNotification(){
        return Inertia::render("notification",["user"=>Auth::user(),"notifications"=>Notif::where("id",Auth::user()->id)->get()]);
      }

      public function deleteNotif(Request $request, $not_id){
        $notif = Notif::find($not_id);

        $notif->delete();
        return Inertia::render("notification",["user"=>Auth::user(),"notifications"=>Notif::where("id",Auth::user()->id)->get()]);
      }
  
}