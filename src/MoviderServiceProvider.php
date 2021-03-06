<?php

namespace VVinners\Movider;

use Illuminate\Support\ServiceProvider;

class MoviderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'movider');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'movider');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('movider.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../database/2021_09_22_073143_create_movider_log_table.php' => database_path('/migrations/2021_09_22_073143_create_movider_log_table.php'),
            ], 'migration');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/movider'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/movider'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/movider'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'movider');

        // Register the main class to use with the facade
        $this->app->singleton('movider', function () {
            return new Movider;
        });
    }
}
