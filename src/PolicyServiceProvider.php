<?php

namespace Unlimited\Policy;


use Illuminate\Support\ServiceProvider;

class PolicyServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views/', 'policyPackage');

        $this->publishes([
            __DIR__.'/../resources/views/' => resource_path('views/vendor/policyPackage')
        ],'policy-package-views');
    }

    public function register()
    {
        //
    }

}