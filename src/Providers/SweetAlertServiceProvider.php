<?php

/**
  * @author Amjad Iqbal
  * @author Amjad Iqbal <douglasm@outlook.com>
  */
  
namespace DMSysOp\SweetAlert\Providers;

use Illuminate\Support\ServiceProvider;

class SweetAlertServiceProvider extends ServiceProvider
{
    
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerHelpers();
        
        $this->loadViewsFrom(__DIR__ . '../../Views', 'sweetalert');

        $this->publishes([
            __DIR__ . '../../Views' => resource_path('Views/vendor/sweetalert')
        ], 'view');

        $this->publishes([
            __DIR__.'../../config/sweetalert.php' => config_path('sweetalert.php')
        ], 'config');

        $this->publishes([
            __DIR__.'../../assets/js' => public_path('sweetalert')
        ], 'public');
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'DMSysOp\SweetAlert\Storage\SessionStore',
            'DMSysOp\SweetAlert\Storage\AlertSessionStore',
            'DMSysOp\SweetAlert\Core\SweetAlert'
        );
        $this->app->singleton('alert', function ($app) {
            return $this->app->make('DMSysOp\SweetAlert\Core\Notifier');
        });
    }

    /**
     * Register helpers file
     */
    public function registerHelpers()
    {
        // Load the helpers in src/functions.php
        if (file_exists($file = __DIR__ . '../../Helpers/functions.php')) {
            require $file;
        }
    }

}
