<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class PanierController extends Controller
{
    public function ajouter(Request $request, Produit $produit)
    {
        $panier = session()->get('panier', []);

        $id = $produit->id;

        if (isset($panier[$id])) {
            $panier[$id]['quantite']++;
        } else {
            $panier[$id] = [
                "nom" => $produit->nom,
                "prix" => $produit->prix,
                "quantite" => 1
            ];
        }

        session()->put('panier', $panier);

        return redirect()->back()->with('success', 'Produit ajouté au panier !');
    }

    public function voir()
    {
        $panier = session()->get('panier', []);
        return view('panier', compact('panier'));
    }
}

