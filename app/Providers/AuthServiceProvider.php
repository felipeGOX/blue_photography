<?php

namespace App\Providers;

 use Illuminate\Support\Facades\Gate;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
        $this->registerPolicies();

        Gate::define('isAdmin', function($user) {
            return $user->Rol()->nombre == 'Admin';
        });

        Gate::define('isOrganizador', function($user) {
            return $user->Rol()->nombre == 'Organizador';
        });

        Gate::define('isInvitado', function($user) {
            return $user->Rol()->nombre == 'Invitado';
        });

        Gate::define('isFotografo', function($user) {
            return $user->Rol()->nombre == 'Fotografo';
        });
    }
}
