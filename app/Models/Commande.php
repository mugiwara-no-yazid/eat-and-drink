<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $table='commandes';

    public function stand(){
        return $this->belongsTo(Stand::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
