<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Stand;
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
                $stands =Stand::all()->where("proprietaire_id",auth()->user()->id);
                return View ('stand.dashbord',["stands"=>$stands]); 
            }
            else
                return redirect()->route("connexion");
    }
    public function detailstand($idstand)
    {
        $stand=Stand::findOrFail($idstand);
        if($stand->proprietaire_id == auth()->user()->id)
           {
                $produits = Produit::all()->where("stand_id",$idstand);
                return View ('stand.standdetail',["stand"=>$stand,"produits"=>$produits]); 
           }
        else
        {
            $stands =Stand::all()->where("proprietaire_id",auth()->user()->id);   
            return redirect()->route('dashboard',["stands"=>$stands])->with('error', "Ce stand n'existe pas.");
        }
            

    }
}
