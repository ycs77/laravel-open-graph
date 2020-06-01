<?php

namespace Ycs77\LaravelOpenGraph;

use Illuminate\Support\ServiceProvider;

class OpenGraphServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('open-graph', function ($app) {
            return new OpenGraph($app['config'], $app['url']);
        });

        $this->app->alias('open-graph', OpenGraph::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'open-graph');
    }
}
