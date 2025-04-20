<?php

return [

    /*
    |----------------------------------------------------------------------
    | Authentication Defaults
    |----------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',  // Default to 'web' guard for admins
        'passwords' => 'users', // Default password resets for users (admins)
    ],

    /*
    |----------------------------------------------------------------------
    | Authentication Guards
    |----------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | You should specify different guards for customers and admins.
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',  // Admins
        ],

        'customer' => [
            'driver' => 'session',
            'provider' => 'customers',  // Customers
        ],
    ],

    /*
    |----------------------------------------------------------------------
    | User Providers
    |----------------------------------------------------------------------
    |
    | User providers are responsible for retrieving the users or customers
    | from the database based on the guard used.
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,  // Admin model
        ],

        'customers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Customer::class,  // Customer model (with uppercase "C")
        ],
    ],

    /*
    |----------------------------------------------------------------------
    | Password Resets
    |----------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',  // Password reset for users (admins)
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],

        'customers' => [
            'provider' => 'customers',  // Password reset for customers
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |----------------------------------------------------------------------
    | Password Confirmation Timeout
    |----------------------------------------------------------------------
    |
    | Here you may define the amount of seconds before a password confirmation
    | times out and the user is prompted to re-enter their password via the
    | confirmation screen. By default, the timeout lasts for three hours.
    |
    */

    'password_timeout' => 10800,
];
