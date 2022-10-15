<?php

namespace Unlimited\Policy;


use Illuminate\Support\ServiceProvider;

class PolicyServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views/policyPackage', 'policyPackage');

    }

    public function register()
    {
        //
    }

}