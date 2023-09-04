<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('admin', function (User $user) {
            return $user->role_id === 1;
        });

        Gate::define('admin-aic', function (User $user) {
            $adminAic = [1, 2];
            return in_array($user->role_id, $adminAic);
        });

        Gate::define('admin-hei', function (User $user) {
            $adminHei = [1, 3];
            return in_array($user->role_id, $adminHei);
        });
    }
}
