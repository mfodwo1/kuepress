<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\CartController;
use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Event::listen(Login::class, function ($event) {
            app(CartController::class)->syncCart();
        });
    }


}
