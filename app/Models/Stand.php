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
}
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    protected $fillable = ['nom', 'description']; // ou les champs que tu as

    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
}
