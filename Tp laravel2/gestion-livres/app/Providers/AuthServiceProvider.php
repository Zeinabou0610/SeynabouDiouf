<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Review;
use App\Policies\ReviewPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Les mappings de politiques pour l'application.
     *
     * @var array
     */
    protected $policies = [
        Review::class => ReviewPolicy::class,
        // Ajoutez d'autres mappings si nécessaire
    ];

    /**
     * Enregistre les services d'authentification/autorisation.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Définissez vos Gates ici si nécessaire
        // Gate::define('update-review', function (User $user, Review $review) {
        //     return $user->id === $review->user_id;
        // });
    }
}