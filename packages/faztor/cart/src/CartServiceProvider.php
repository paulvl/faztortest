<?php

namespace FaztorCart;

use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
        $this->publishes([
            __DIR__.'/../../../lang/en/confirmations.php' => base_path('resources/lang/en/confirmations.php')
        ]);
        */
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerFaztorCartInstance();
    }

    /**
     * Register the faztor cart instance.
     *
     * @return void
     */
    protected function registerFaztorCartInstance()
    {
        $this->app->singleton('faztor.cart', function ($app) {
            return new Cart();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['faztor.cart'];
    }
}
