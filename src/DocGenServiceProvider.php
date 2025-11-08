<?php

namespace SMMahfujurRahman\DocGen;

use Illuminate\Support\ServiceProvider;

class DocGenServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Merge package configuration
        $this->mergeConfigFrom(
            __DIR__.'/../config/docgen.php', 'docgen'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Publish configuration file
        $this->publishes([
            __DIR__.'/../config/docgen.php' => config_path('docgen.php'),
        ], 'docgen-config');

        // Publish routes file (optional - for customization)
        $this->publishes([
            __DIR__.'/../routes/docs.php' => base_path('routes/docs.php'),
        ], 'docgen-routes');

        // Publish views (optional - for customization)
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/documentations'),
        ], 'docgen-views');

        // Publish dummy documentation
        $this->publishes([
            __DIR__.'/../stubs/docs' => base_path('docs'),
        ], 'docgen-docs');

        // Publish all assets at once
        $this->publishes([
            __DIR__.'/../config/docgen.php' => config_path('docgen.php'),
            // __DIR__.'/../resources/views' => resource_path('views/documentations'),
            __DIR__.'/../stubs/docs' => base_path('docs'),
        ], 'docgen');

        // Load routes automatically from package (no need to publish)
        if (config('docgen.auto_register_routes', true)) {
            $this->loadRoutesFrom(__DIR__.'/../routes/docs.php');
        }

        // Load views from published directory first (if exists), then from package
        if (is_dir(resource_path('views/documentations'))) {
            $this->loadViewsFrom(resource_path('views/documentations'), 'docgen');
        }
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'docgen');
    }
}
