<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema; // Importer le façade Schema
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Enregistrer les services de l'application.
     */
    public function register()
    {
        //
    }

    /**
     * Amorcer les services de l'application.
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
