<?php

namespace Quentinhnrt\TabsOption\TabPage;


use Themosis\Support\Facades\Page;

class TabPage
{
    public static function make($slug, $name) {

        $page = Page::make($slug, $name);

        $page->ui()->setTheme('tabs-page')->setLayout('tabs');

        return $page;
    }
}