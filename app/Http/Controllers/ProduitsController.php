<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitFilterRequest;
use App\Http\Requests\UpdateProduitFilterRequest;
use App\Models\Produit;
use App\Models\Stand;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProduitsController extends Controller
{
    public function formaddproduit($id) :View | RedirectResponse
    {
        
        $stand=Stand::findOrFail($id);
         if($stand->proprietaire_id == auth()->user()->id)
         {
            return view("stand.formproduit",["stand"=>$stand]);
         }
            
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
        return redirect()->route("addproduit",$id)->with('sucess',"produit ajouter");
    }

    public function modifieproduit($id,$idproduit) :View | RedirectResponse
    {
        
        $stand=Stand::findOrFail($id);
         if($stand->proprietaire_id == auth()->user()->id)
         {
            $produit=Produit::find($idproduit);
            
            if(!isset($produit))
                return redirect()->route("addproduit",$stand);
                
           return view("stand.formproduit",["stand"=>$stand,"produit"=>$produit]);
         }
            
        else
        {
            $stands =Stand::all()->where("proprietaire_id",auth()->user()->id);   
            return redirect()->route('dashboard',["stands"=>$stands])->with('error', "Ce stand ne vous appartient pas.");
        }
    }

    public function updateprod(UpdateProduitFilterRequest $req,$id,$idproduit)
    {
        
        $produit = Produit::find($idproduit);
        $produit->nom=$req->validated()["nom"];
        $produit->description=$req->validated()["description"];
        $produit->prix=$req->validated()["prix"];
        if(isset($req->validated()["image_url"]))
         {
            unlink("photos/".$produit->image_url);
            $filename ="stand".$id.time().'.'.$req->image_url->extension();
            $produit->image_url=$filename;
            $req->validated()["image_url"]->move( public_path('photos') , $filename);
            
         }
         $produit->save();
        return redirect()->route('modifieproduit', ['id' => $id,'produit' => $idproduit,])->with('sucess',"produit modifié");
    }

    public function delprod($id,$produit)
    {
        $produit = Produit::find($produit);
        if ($produit) {
            $message = "Le produit ". $produit->nom." supprimé avec succès.";
            unlink("photos/".$produit->image_url);
            $produit->delete();
            return redirect()->route("detailstand",$id)->with('success', $message);
        } else {
            return redirect()->route("detailstand",$id)->with('error', 'Produit non trouvé.');
        }
    }
}
  
