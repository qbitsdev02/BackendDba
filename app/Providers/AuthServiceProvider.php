<?php

namespace App\Providers;

use App\Models\Coin;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use App\Models\Module;
use App\Models\Permission;
use App\Models\State;
use App\Policies\CoinPolicy;
use App\Policies\StatePolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Coin::class => CoinPolicy::class,
        State::class => StatePolicy::class
    ];


    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        if (Schema::hasTable('modules') && Schema::hasTable('permissions')) {
            $modules = Module::all();
            $permissions = Permission::all();
            foreach ($modules as $module) {
                foreach ($permissions as $permission) {
                    $gateName = $module->name . '-' . $permission->value;
                    Gate::define($gateName, function ($user) use ($module, $permission) {
                        return $user->hasAccess($module->id, $permission->id);
                    });
                }
            }
        }

        Passport::routes();
    }
}
