<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carte extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre', 'description', 'image', 'musique', 'video', 'id_categorie', 'id_taille_cart', 'id_proprietaire'
    ];

    public function categorie()
    {
        return $this->belongsTo(Category::class, 'id_categorie');
    }

    public function tailleCarte()
    {
        return $this->belongsTo(TailleCarte::class, 'id_taille_cart');
    }

    public function proprietaire()
    {
        return $this->belongsTo(User::class, 'id_proprietaire');
    }
}
