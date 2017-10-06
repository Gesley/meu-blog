<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'github' => [
        'client_id' => '3dee525667df070627aa',
        'client_secret' => 'da92195b31e4eb12c8d3c14ebc7e4f96b46d053b',
        'redirect' => 'http://localhost:8000/auth/github/callback'
    ],

    'facebook' => [
    'client_id' => '117001739045471',
    'client_secret' => '1eb266dee312e6a5e0096353ada2b152',
    'redirect' => 'http://localhost:8000/auth/facebook/callback',
],

];
