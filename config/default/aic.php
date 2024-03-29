<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Version
    |--------------------------------------------------------------------------
    |
    | This value is the version of your application. This value is used when
    | the framework needs to place the application's version in a notification
    | or any other location as required by the application or its packages.
    */

    'version' => env('APP_VERSION', '1.0.0'),

    /*
    |--------------------------------------------------------------------------
    | Application Documentation
    |--------------------------------------------------------------------------
    |
    | A URL to where you can find documentation on the API.
    */

    'documentation_url' => env('APP_DOCUMENTATION_URL', null),

    /*
    |--------------------------------------------------------------------------
    | Application Message
    |--------------------------------------------------------------------------
    |
    | A short notice to appear at the bottom of each API call
    */

    'message' => env('APP_MESSAGE', null),

    /*
    |--------------------------------------------------------------------------
    | Configuration Documentation
    |--------------------------------------------------------------------------
    |
    | An array of key-value pairs that will be output at the bottom of each
    | call to the API. This is useful to convey things like URLs to other
    | systems the returned data relies on to function. For example, if one of
    | the fields is `image` and the file name needs to be retrieved from a
    | particular server, you can document the server here.
    */

    'config_documentation' => [],

    /*
    |--------------------------------------------------------------------------
    | Proxy URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the frontend to properly generate URLs when using
    | the app behind a CDN or load balancer.
    |
    */

    'proxy_url' => env('PROXY_URL', env('APP_URL', 'http://localhost')),

    'proxy_scheme' => env('PROXY_SCHEME', 'http'),

    /*
    |--------------------------------------------------------------------------
    | Basic HTTP Auth
    |--------------------------------------------------------------------------
    |
    | Use the `basic_auth` middleware to secure routes.
    |
    */
    'basic_auth' => [
        'username' => env('BASIC_AUTH_USERNAME'),
        'password' => env('BASIC_AUTH_PASSWORD'),
    ],
];
