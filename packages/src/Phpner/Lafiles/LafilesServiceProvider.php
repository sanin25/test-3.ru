<?php
namespace Phpner\Lafiles;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Phpner\Lafiles\Services\File as FileService;
use Config;
use File;
use Storage;

class LafilesServiceProvider extends ServiceProvider {

    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Phpner\Lafiles\Events\FileWasDeleted' => [
            'Phpner\Lafiles\Handlers\Events\DeleteFile',
        ],
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);
        
        if (! $this->app->routesAreCached()) {
            require __DIR__ . '/Http/routes.php';
        }
        
        $this->publishes([
            __DIR__ . '/config/config.php' => config_path('lafiles.php')
        ]);
        
        $this->publishes([
            __DIR__ . '/database/migrations/' => database_path('migrations')
        ], 'migrations');
        
        $this->publishes([
            __DIR__ . '/resources/assets' => public_path('vendor/phpner/lafiles')
        ], 'public');
        
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'lafiles');
        
        $this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'lafiles');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {        
    }
}
