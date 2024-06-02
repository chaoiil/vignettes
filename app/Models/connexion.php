<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Utilisateur extends Model
{
    protected $table = 'utilisateurs';

    protected $fillable = [
        'nom', 'email', 'mot_de_passe',
    ];

    protected $hidden = [
        'mot_de_passe', 'remember_token',
    ];
}

