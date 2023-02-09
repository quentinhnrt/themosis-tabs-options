<?php

namespace Quentinhnrt\TabsOption\Providers;

use Illuminate\Support\Facades\View;

class ViewServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        View::composer('tabs-page.sections', function ($view) {
            global $wp_settings_sections, $wp_settings_fields;
            $view->with('wp_settings_sections', $wp_settings_sections);
            $view->with('wp_settings_fields', $wp_settings_fields);
        });
    }
}