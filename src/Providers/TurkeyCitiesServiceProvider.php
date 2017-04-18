<?php namespace Turkey\Cities\Providers;

/**
 * Created by PhpStorm.
 * User: cuneyt
 * Date: 17/04/2017
 * Time: 16:33
 */
use Illuminate\Support\ServiceProvider;

class TurkeyCitiesServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerConfig();
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->app->register('Maatwebsite\Excel\ExcelServiceProvider');
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Excel', 'Maatwebsite\Excel\Facades\Excel');

        $this->commands('command.turkey.cities');
        $this->app->singleton('command.turkey.cities', function ($app) {
            return new \Turkey\Cities\Console\CitiesCommand();
        });
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__ . '/../Config/config.php' => config_path('turkey-cities.php'),
        ]);

        $this->mergeConfigFrom(
            __DIR__ . '/../Config/config.php', 'turkey-cities'
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('command.turkey.cities');
    }
}