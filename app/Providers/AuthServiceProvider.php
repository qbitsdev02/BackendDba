<?php

namespace App\Providers;

use App\Models\Active;
use App\Models\Coin;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use App\Models\Module;
use App\Models\PaymentOrder;
use App\Models\Permission;
use App\Models\Personal;
use App\Models\Port;
use App\Models\Provider;
use App\Models\ProviderType;
use App\Models\Rate;
use App\Models\StaffType;
use App\Models\State;
use App\Models\Ticket;
use App\Policies\ActivePolicy;
use App\Policies\AttributePolicy;
use App\Policies\CoinPolicy;
use App\Policies\PaymentOrderPolicy;
use App\Policies\PersonalPolicy;
use App\Policies\PortPolicy;
use App\Policies\ProviderPolicy;
use App\Policies\ProviderTypePolicy;
use App\Policies\RatePolicy;
use App\Policies\StaffTypePolicy;
use App\Policies\StatePolicy;
use App\Policies\TicketPolicy;
use Attribute;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Coin::class => CoinPolicy::class,
        State::class => StatePolicy::class,
        Provider::class => ProviderPolicy::class,
        ProviderType::class => ProviderTypePolicy::class, 
        Rate::class => RatePolicy::class,
        Ticket::class => TicketPolicy::class,
        PaymentOrder::class => PaymentOrderPolicy::class,
        Port::class =>PortPolicy::class,
        StaffType::class => StaffTypePolicy::class,
        Personal::class => PersonalPolicy::class,
        Active::class=>ActivePolicy::class,
        Attribute::class=>AttributePolicy::class,
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
