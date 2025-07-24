<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    protected $fillable=[
        'name_stand',
        'category',
        'description',
        'logo',
    ];

    public function user(){
        return $this->belongsTo(User::class,'proprietaire_id');
    }

    public function products(){
        return $this->hasMany(Produit::class);
    }

    public function commands(){
        return $this->hasMany(Commande::class);
    }
}
