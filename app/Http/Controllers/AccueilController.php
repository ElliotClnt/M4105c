<?php

namespace App\Http\Controllers;

use App\Models\Notif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AccueilController extends Controller
{
    function displayAccueil() {
        return Inertia::render("accueil",["user"=>Auth::user()]);
    }
}
