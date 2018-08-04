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

    'facebook' => [
    'client_id' => env('FB_KEY','2036922369962541'),         // Your facebook Client ID
    'client_secret' => env('FB_SECRET','9809fcd12dd0f2ff59d560b7a1e655af'), // Your facebook Client Secret
    'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],

    'twitter' => [
    'client_id' => env('TWITTER_KEY','QKh04AASjgtMALVWxhx6Paay5'),         // Your twitter Client ID
    'client_secret' => env('TWITTER_SECRET','9nGAkt20oC0hI6I8dzk6PIeKpDWCjnVXptLWTDRkCJgx0uNMMc'), // Your twitter Client Secret
    'redirect' => 'http://localhost:8000/login/twitter/callback',
    ],

    'google' => [
    'client_id' => env('GOOGLE_KEY','583920146865-n866iuf95dsctj03vdtgjga3f8dl59fe.apps.googleusercontent.com'),         // Your google Client ID
    'client_secret' => env('GOOGLE_SECRET','VuQ9_wrrYnxsDSqLFExDkP3u'), // Your google Client Secret
    'redirect' => 'http://localhost:8000/login/google/callback',
    ],

    'linkedin' => [
    'client_id' => env('LINKEDIN_KEY','780w5hsy3nnv2d'),         // Your linkedin Client ID
    'client_secret' => env('LINKEDIN_SECRET','xn47bnxfC8MXbDEV'), // Your linkedin Client Secret
    'redirect' => 'http://localhost:8000/login/linkedin/callback',
    ],


];
