<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function connexion():View {
    return View('auth.login');
    }

    public function connecter(LoginRequest $req) {
        $user = User::where('email', $req->validated()["email"])->firstOrFail();
       if(Hash::check($req->validated()["password"], $user->password)== true )
            {Auth::login($user);
            return redirect()->route("dashboard");}
        else 
            return redirect()->route("connexion");
    }

    public function deconnexion():RedirectResponse
    {
        Auth::logout();
        return redirect()->route("connexion");;
    }
}
