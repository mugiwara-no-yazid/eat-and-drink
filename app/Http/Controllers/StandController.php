<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterStandFilterRequest;
use App\Models\Stand;
use Exception;
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

    public function manageStand(Request $action, $id){
        if(!in_array($action->input('action'), ['accept', 'reject'])) throw new Exception('Action inconnue.');
        if(Auth::user() && Auth::user()->role === 'admin'){
            Stand::findOrfail($id)->update(['status'=>($action === 'accept' ? 'accepted' : 'rejected')]);
            $stats=[
                'accepted'=>count(Stand::where('status','=', 'accepted')->get()),
                'pending'=>count(Stand::where('status','=', 'pending')->get())
            ];
            return view('admin.includes.waitingList')->with('stats',$stats);
        }
    }

}
