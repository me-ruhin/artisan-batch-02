<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        // 'App\Models\Post' => 'App\Policies\PostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        Gate::define('view-admin-dashboard', function () {
            return  auth()->user()->role_name === 'admin';
        });
        Gate::define('view-student-dashboard', function () {
            return  auth()->user()->role_name === 'student';
        });
        Gate::define('view-instructor-dashboard', function () {
            return  auth()->user()->role_name === 'instructor';
        });

       // post-add , post-edit,post-view, post-delete --  Model 

        $this->registerPolicies();

        //
    }
}
