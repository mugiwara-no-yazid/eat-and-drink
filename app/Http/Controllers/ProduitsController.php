<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitFilterRequest;
use App\Models\Produit;
use App\Models\Stand;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProduitsController extends Controller
{
    public function formaddproduit($id) :View | RedirectResponse
    {
        
        $stand=Stand::findOrFail($id);
         if($stand->proprietaire_id == auth()->user()->id)
            return view("stand.formproduit",["stand"=>$stand]);
        else
        {
            $stands =Stand::all()->where("proprietaire_id",auth()->user()->id);   
            return redirect()->route('dashboard',["stands"=>$stands])->with('error', "Ce stand n'existe pas.");
        }
    }
    public function addproduit($id,ProduitFilterRequest $req)
    {
        $filename ="stand".$id.time().'.'.$req->image_url->extension();
        
        $produit = new Produit();
        $produit->nom=$req->validated()["nom"];
        $produit->description=$req->validated()["description"];
        $produit->prix=$req->validated()["prix"];
        $produit->image_url=$filename;
        $req->validated()["image_url"]->move( public_path('photos') , $filename);
        $produit->stand_id=$id;
        $produit->save();
        return redirect()->route("addproduuit",$id)->with('sucess',"produit ajouter");
      
        
    }
}
