<?php

namespace AdrianMejias\States;

use Illuminate\Support\ServiceProvider;

/**
 * StatesServiceProvider
 *
 */

class StatesServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
    * Bootstrap the application.
    *
    * @return void
    */
    public function boot()
    {
        // The publication files to publish
        $this->publishes([__DIR__ . '/../../config/config.php' => config_path('states.php')]);

        // Append the state settings
        $this->mergeConfigFrom(__DIR__ . '/../../config/config.php', 'states');
    }
        
    /**
     * Register everything.
     *
     * @return void
     */
    public function register()
    {
        $this->registerStates();
        $this->registerCommands();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function registerStates()
    {
        $this->app->bind('states', function ($app) {
        
            return new States();
        });
    }

    /**
     * Register the artisan commands.
     *
     * @return void
     */
    protected function registerCommands()
    {
        $this->app->singletone('command.states.migration', function ($app) {
            return new MigrationCommand($app);
        });

        $this->commands('command.states.migration');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['states'];
    }
}
