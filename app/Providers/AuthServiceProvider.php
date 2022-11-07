<?php

namespace App\Providers;

use App\Models\Team;
use App\Models\User;
use App\Policies\TeamPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('Manage-Admin', function (User $user) {
            return $user->role_id == '1';
        });
        Gate::define('Manage-Customer', function (User $user) {
            return $user->role_id == '3';
        });
        Gate::define('Manage-Supplier', function (User $user) {
            return $user->role_id == '2';
        });

        //
    }
}
