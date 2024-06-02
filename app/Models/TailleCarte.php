<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TailleCarte extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'largeur',
        'hauteur',
    ];

    public function cartes()
    {
        return $this->hasMany(Carte::class, 'id_taille_cart');
    }
}
