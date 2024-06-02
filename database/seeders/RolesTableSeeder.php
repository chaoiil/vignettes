<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run(): void
    {
        // Insère les rôles uniquement s'ils n'ex
        foreach(['admin', 'user'] as $role) {
        Role::createOrFirst([
            'name' => $role
        ]);
        }

    }
}
