<?php

return [

    /*
    |-------------------------------------------------------------------------- 
    | Authentication Defaults
    |-------------------------------------------------------------------------- 
    |
    | This option controls the default authentication "guard" and password 
    | reset options for your application. You may change these defaults 
    | as required, but they're a perfect start for most applications.
    | 
    */
    'defaults' => [
        'guard' => 'api', // Gunakan 'api' untuk autentikasi API, jika Anda ingin menggunakan token
        'passwords' => 'users',
    ],

    /*
    |-------------------------------------------------------------------------- 
    | Authentication Guards
    |-------------------------------------------------------------------------- 
    |
    | Here you may define every authentication guard for your application. 
    | You have a "web" guard and an "api" guard.
    | 
    */
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'sanctum', // Ganti 'token' menjadi 'sanctum' untuk API
            'provider' => 'users',
        ],
    ],

    /*
    |-------------------------------------------------------------------------- 
    | User Providers
    |-------------------------------------------------------------------------- 
    |
    | All authentication drivers have a user provider. This defines how the 
    | users are actually retrieved out of your database or other storage 
    | mechanisms used by this application to persist your user's data.
    | 
    */
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
    ],

    /*
    |-------------------------------------------------------------------------- 
    | Passwords
    |-------------------------------------------------------------------------- 
    |
    | You may specify multiple password reset configurations.
    | 
    */
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,
];
