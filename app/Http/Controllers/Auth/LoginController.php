<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function displayLogin(Request $request){
        return Inertia::render("login");
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            "email" => [
                "required",
                "email"
            ],
            "password" => [
                "required"
            ]
        ]);
        
        $credentials["password"] = $request->password;
        
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('accueil');
        }
        return back()->withErrors([
            'email' => "Compte et/ou mot de passe incorrect"
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        return Inertia::render('login');
    }

    

}
