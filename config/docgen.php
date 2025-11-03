<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Documentation Route Prefix
    |--------------------------------------------------------------------------
    |
    | This value determines the route prefix for accessing documentation.
    | Default is "documentation" to avoid conflicts with other packages.
    |
    */

    'route_prefix' => env('DOCGEN_ROUTE_PREFIX', 'documentation'),

    /*
    |--------------------------------------------------------------------------
    | Documentation Directory
    |--------------------------------------------------------------------------
    |
    | The directory where your Markdown documentation files are stored.
    | Relative to the Laravel base path.
    |
    */

    'docs_path' => env('DOCGEN_DOCS_PATH', 'docs'),

    /*
    |--------------------------------------------------------------------------
    | Enable Route Registration
    |--------------------------------------------------------------------------
    |
    | Set to false if you want to manually register routes in your
    | application's routes file instead of using the package routes.
    |
    */

    'auto_register_routes' => env('DOCGEN_AUTO_ROUTES', true),

    /*
    |--------------------------------------------------------------------------
    | CommonMark Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration options for the League CommonMark converter.
    |
    */

    'commonmark' => [
        'html_input' => 'allow',
        'allow_unsafe_links' => false,
    ],

];
