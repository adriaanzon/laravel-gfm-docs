<?php

namespace AdriaanZon\LaravelGfmDocs;

use Illuminate\Support\ServiceProvider;

class GfmDocsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'gfm-docs');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/gfm-docs.php', 'gfm-docs');
    }
}
