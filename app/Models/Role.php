<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;


class Roles extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);

    }
}