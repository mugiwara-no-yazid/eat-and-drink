<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Stand;
use Illuminate\Http\Request;

class AdminRouter extends Controller
{
    public function router($uri){
        $match=[
            'standApproved'=>'admin.includes.approvedStand',
        ];

        return view($match[$uri]);
    }

    public static function getDashInfos($action=null){
            $stats=[
                'accepted'=>count(Stand::where('status','=', 'accepted')->get()),
                'pending'=>count(Stand::where('status','=', 'pending')->get()),
                'commands'=>count(Commande::all())
            ];
            if($action === null) return $stats;
            $needle=Stand::where('status', '=', $action)->with('user')->get();
        return [
            'needle'=> $needle,
            'stats'=>$stats
        ];  
    }
}
