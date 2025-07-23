<?php

use App\Http\Controllers\AdminLogin;
use App\Http\Controllers\AdminRouter;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StandController;
use App\Http\Middleware\CheckIfActivated;
use App\Http\Middleware\hasRoleAdmin;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\Stand;
use App\Models\User;
use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\select;

Route::controller(RegisterController::class)->group(function()
{
    Route::get('/register','inscription')->name('inscription');
    Route::post('/register','adduser');
});

Route::get("/compteInactif",function()
{
    return(view("patiente"));
})->name("inactif");

Route::controller(LoginController::class)->group(function()
{
    Route::get('/login','connexion')->name('login');
    Route::get('/logout','deconnexion')->name('deconnexion');
    Route::post('/login','connecter');
});
//,CheckIfActivated::class middleware pour rediriger l'utilisateur si son compte est en attente
Route::middleware(['auth',CheckIfActivated::class])->group(function(){

    Route::controller(StandController::class)->group(function()
{
    Route::get('/register/stand','inscription')->name('inscriptionStand');
    Route::post('/register/stand','addStand');
});

Route::controller(DasboardController::class)->group( function()
{
    Route::get('/dashboard','dash')->name("dashboard");
    Route::get('/dashboard-stand/{id}',"detailstand")->name("detailstand");
});

Route::controller(ProduitsController::class)->group( function()
{
    Route::get('/dashboard-stand/{id}/addproduit',"formaddproduit")->name("addproduit");
    Route::post('/dashboard-stand/{id}/addproduit',"addproduit");
    Route::get('/dashboard-stand/{id}/addproduit/{produit}',"modifieproduit")->name("modifieproduit");
    Route::post('/dashboard-stand/{id}/addproduit/{produit}',"updateprod");
    Route::get('/dashboard-stand/{id}/del/{produit}',"delprod")->name("supprimerproduit");    
});
});

Route::controller(AdminLogin::class)->group(
    function(){
        Route::get('/admin/auth/2468Laravel', 'auth');
        Route::post('/admin/auth/2468Laravel', 'verifyEntries');
    }
)->middleware(hasRoleAdmin::class);

Route::controller(AdminRouter::class)->prefix('admin/home')->group(
    function(){
        Route::get('/waitingList', function(){
            $waiting=Stand::where('status', '=', 'pending')->with('user')->get();
            $stats=[
                'accepted'=>count(Stand::where('status','=', 'accepted')->get()),
                'pending'=>count($waiting),
                'commands'=>count(Commande::all())
            ];
            return view('admin.includes.waitingList')->with('waiting', $waiting)->with('stats', $stats);
        })->name('waitingList');

        Route::get('/standApproved', function(){
            $approved=Stand::where('status', '=', 'accepted')->with('products')->get();
            $stats=[
                'accepted'=>count($approved),
                'pending'=>count(Stand::where('status','=', 'pending')->get()),
                'commands'=>count(Commande::all())
            ];
            return view('admin.includes.approvedStand')->with('approved', $approved)->with('stats', $stats);
        })->name('standApproved');


        Route::post('/standAccept/{id}', [StandController::class, 'manageStand'])->name('stand-approve');
        Route::post('/standReject/{id}', [StandController::class, 'manageStand'])->name('stand-reject');

    }
)->middleware(hasRoleAdmin::class);

 Route::get('/',function()
 {
$stands =Stand::all();
  return view("acceuil.accueilstand",["stands"=>$stands]);  
 })->name("index");

 Route::get('/Stand/{id}/produits', function ($id) {
    $stand =Stand::findOrFail($id);
    $produits = Produit::all()->where("stand_id",$id);
    $proprietaire = User::findOrFail($stand->proprietaire_id);
    return view("acceuil.produitstand",["stand"=>$stand,"produits"=>$produits,"proprietaire"=>$proprietaire]);
})->name("voirStand");

Route::get('/addcommande/{id}', function ($id) {
    request()->validate([
        'quantity' => 'required|integer|min:1'
    ]);
    
    $quantity = (int) request()->query('quantity');
    $cart = session()->get('cart', []);
    
    $cart[$id] = ($cart[$id]["quantity"] ?? 0) + $quantity;
    session()->put('cart', $cart);
    return redirect()->back()->with('success', 'Produit ajouté au panier!');
})->name('addcommande');


Route::get('/panier', function() {
    $cart = session()->get('cart', []);
    $products = [];
    $total = 0;

    foreach ($cart as $productId => $quantity) {
        $product = Produit::find($productId);
        
        if ($product) {
            $productTotal = $product->prix * $quantity;
            $total += $productTotal;
            
            $products[] = [
                'id' => $product->id,
                'nom' => $product->nom,
                'prix' => $product->prix,
                'quantite' => $quantity,
                'total' => $productTotal,
                'image' => $product->image_url
            ];
        }
    }

    return view('acceuil.panier', [
        'products' => $products,
        'total' => $total
    ]);
})->name('panier');


Route::post('/update-cart/{id}', function($id) {
    request()->validate(['quantity' => 'required|integer|min:1']);
    
    session()->put('cart.'.$id, request('quantity'));
    
    return back()->with('success', 'Quantité mise à jour');
})->name('update-cart');


Route::get('/remove-from-cart/{id}', function($id) {
    session()->forget('cart.'.$id);
    
    return back()->with('success', 'Produit retiré du panier');
})->name('remove-from-cart');
