<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     */

     protected $policies = [
        // 2. Ajoutez votre mapping ici
        Review::class => ReviewPolicy::class,
    ];


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
    }
}
