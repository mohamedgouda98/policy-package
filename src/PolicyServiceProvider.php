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

        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('policyPackage.php'),
        ], 'policy-package-config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'policyPackage');
    }

}