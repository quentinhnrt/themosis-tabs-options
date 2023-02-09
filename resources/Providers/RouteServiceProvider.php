<?php

namespace Quentinhnrt\TabsOption\Providers;

use Themosis\Core\Support\Providers\RouteServiceProvider as ServiceProvider;
use Themosis\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Controller namespace for plugin routes.
     *
     * @var string
     */
    protected $namespace = 'Quentinhnrt\TabsOption\Controllers';

    public function boot()
    {
        parent::boot();
    }

    /**
     * Load plugin routes.
     */
    public function map()
    {
        $pluginName = ltrim(
            str_replace(muplugins_path(), '', realpath(__DIR__.'/../../')),
            '\/'
        );

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(muplugins_path($pluginName.'/routes.php'));
    }
}
