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
        return $this->belongsTo(User::class);
    }
}
