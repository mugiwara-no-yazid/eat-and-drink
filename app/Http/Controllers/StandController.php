<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterStandFilterRequest;
use App\Models\Stand;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StandController extends Controller
{
     public function inscription(): View | RedirectResponse
    {
        if (Auth::check()== true)
            return View('auth.registerstand');
        else 
            return redirect()->route("connexion");
    }
    public function addStand(RegisterStandFilterRequest $req): RedirectResponse
    {
        //name_stand
        $stand = new Stand();
        $stand->name_stand   =$req->validated()["name"];
        $stand->category =$req->validated()["category"];
        $stand->description =$req->validated()["description"];
        $stand->proprietaire_id =auth()->user()->id;
        if (isset($req->logo))
            {
                $filename = time().'.'.$req->logo->extension();
                $req->logo->move( public_path('photos') , $filename);
                $stand->logo =$filename;
            }
            $stand->save();
        return redirect()->route("dashboard");
    }
}



class StandController extends Controller
{
    // Affiche tous les stands
    public function index()
    {
        $stands = Stand::all();
        return view('accueilstand', compact('stands'));
    }

    // Affiche les produits du stand sélectionné
    public function voir(Stand $stand)
    {
        $produits = $stand->produits;
        return view('produitsstand', compact('stand', 'produits'));
    }
}
