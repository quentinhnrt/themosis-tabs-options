<?php

namespace Quentinhnrt\TabsOption\Providers;

use Themosis\Support\Facades\Asset;

class AssetServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        /** @var PluginManager $plugin */
        $plugin = $this->app->make('wp.plugin.tabs-options');

        Asset::add('tabs_options_styles', 'style.css', [], $plugin->getHeader('version'))->to('admin');
        Asset::add('tabs_options_js', 'index.js', [], $plugin->getHeader('version'))->to('admin');
    }
}