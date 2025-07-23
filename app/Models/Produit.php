<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable =
    [
        'nom',
        'description',
        'prix',
        'image_url',
    ];
}

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = ['nom', 'description', 'prix', 'stand_id'];

    public function stand()
    {
        return $this->belongsTo(Stand::class);
    }
}
