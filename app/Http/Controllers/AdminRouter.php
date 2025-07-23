<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminRouter extends Controller
{
    public function router($uri){
        $match=[
            'standApproved'=>'admin.includes.approvedStand',
        ];

        return view($match[$uri]);
    }
}
