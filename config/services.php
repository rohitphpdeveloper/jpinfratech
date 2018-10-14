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
        'client_id'     =>'239455550007389',
        'client_secret' =>'49615e55cfc1c6fb3b0c92a3d22eb543',
        'redirect' => 'https://emergingncr.com/jobvoie/login/facebook/callback',
    ],

     'google' => [
        'client_id' => '1051082966863-im9q3lv7ekp9kqlctiik6ln3tt7vilss.apps.googleusercontent.com',
        'client_secret' =>'ZN9wVrXRp_bAjOWBmdNJLQ1f',
        'redirect' => env('APP_URL') . 'login/google/callback',
    ],

];
