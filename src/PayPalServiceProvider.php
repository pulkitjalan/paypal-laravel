<?php

namespace PulkitJalan\PayPal;

use Illuminate\Support\ServiceProvider;

class PayPalServiceProvider extends ServiceProvider
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
        $this->app['PayPal'] = function ($app) {
            return $app[PayPal::class];
        };
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PayPal::class, function ($app) {
            return new PayPal(array_get($app['config'], 'services.paypal'));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            PayPal::class,
            'PayPal',
        ];
    }
}
