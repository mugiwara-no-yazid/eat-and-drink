<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    public function inscription(): View
    {
        return View("auth.register");
    }

    public function adduser(UserRequest $req)
    {
        $user = new User();
        $user->name = $req->validated()['name'];
        $user->password = Hash::make($req->validated()['password']);
        $user->email = $req->validated()['email'];
        $user->number = $req->validated()['number'];
        $user->role="user";
        $user->statut ="pending";
        $user->save();
    
        Auth::login($user);
        return redirect()->route('inscriptionStand');
    }
}
