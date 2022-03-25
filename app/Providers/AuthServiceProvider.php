<?php

namespace App\Providers;



use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Models\Shortcut;
use App\Models\Comment;
use App\Models\User;

use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update', function (User $user, Shortcut $shortcut) {
            return $user->id === $shortcut->user_id;
        });

        Gate::define('delete', function (User $user, Shortcut $shortcut) {
            return $user->id === $shortcut->user_id;
        });

        
    }
}
