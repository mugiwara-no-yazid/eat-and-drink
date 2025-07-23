<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Stand;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminLogin extends Controller
{
    public function auth(){
        return view('auth.admin');
    }

    public function verifyEntries(LoginRequest $entries){
        $user=User::where('email', $entries->validated()['email'])->first();
        if(!$user) abort(403, "Accès interdit");

        if(Hash::check($entries->validated()['password'], $user->password) == true){
            if($user->role !== 'admin'){
                abort(403, "Accès interdit");
            }

            $stats=[
                'accepted'=>count(Stand::where('status','=', 'accepted')->get()),
                'pending'=>count(Stand::where('status','=', 'pending')->get())
            ];
            return view('admin.includes.waitingList')->with('stats',$stats);
        }
    }
}
