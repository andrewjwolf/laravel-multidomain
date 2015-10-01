<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Default Domain and Aliases
    |--------------------------------------------------------------------------
    |
    | This option controls the bootstrapping based on vhost parallels
    |
    |
    */

    [
        'bootstrap' => 'Trdp/Domain/Providers/DomainBootstrapServiceProvider',
        'serverName' => 'laravel.dev',
        'serverAliases' => [
            'www.laravel.dev',
        ]
    ]
];

