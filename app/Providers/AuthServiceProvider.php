<?php

namespace App\Providers;

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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Game mod
        Gate::define('game_mod_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Backgrounds
        Gate::define('background_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('background_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('background_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('background_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('background_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Images
        Gate::define('image_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('image_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('image_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('image_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('image_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Scenarios
        Gate::define('scenario_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('scenario_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('scenario_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('scenario_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('scenario_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Players
        Gate::define('player_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('player_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('player_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('player_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('player_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Games
        Gate::define('game_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('game_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('game_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('game_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('game_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Results
        Gate::define('result_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('result_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('result_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('result_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('result_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Game results
        Gate::define('game_result_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('game_result_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('game_result_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('game_result_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('game_result_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Section
        Gate::define('section_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('section_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('section_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('section_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('section_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Languages
        Gate::define('language_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('language_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('language_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('language_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('language_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Translation items
        Gate::define('translation_item_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('translation_item_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('translation_item_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('translation_item_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('translation_item_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

    }
}
