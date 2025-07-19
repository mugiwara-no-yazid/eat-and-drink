<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DasboardController extends Controller
{
    public function dash ():View | RedirectResponse
    {
            if (Auth::check()== true)
            {
                 return View ('stand.dashbord'); 
            }
            else
                return redirect()->route("connexion");
       
    }
}
