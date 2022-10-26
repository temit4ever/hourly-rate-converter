<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'exchange-rate' => [
        'key' => env('EXCHANGE_RATE_API_KEY', 'UuuhztAUaqyWX50yugZfFnA0ij2AGFWc'),
        'uri' => env('URI', 'https://api.apilayer.com/exchangerates_data/latest?'),
        'external' => env('EXTERNAL_EXCHANGE_RATE', false),
        'retry' => env('RETRY_TIMES', 10),
        'retry-milliseconds' => env('RETRY_MILLISECONDS', 100)
    ],

];
