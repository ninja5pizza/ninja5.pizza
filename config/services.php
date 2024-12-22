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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'horizon' => [
        'token' => env('HORIZON_TOKEN'),
    ],

    'fathom' => [
        'site_id' => env('FATHOM_SITE_ID'),
    ],

    'blockcypher' => [
        'base_url' => 'https://api.blockcypher.com/v1/',
    ],

    'coinmarketcap' => [
        'base_url' => 'https://pro-api.coinmarketcap.com/v1/',
        'api_key' => env('COIN_MARKET_CAP_API_KEY'),
    ],

    'magiceden' => [
        'base_url' => 'https://api-mainnet.magiceden.dev/v2/',
        'api_key' => env('MAGIC_EDEN_API_KEY'),
    ],

    'ordinals' => [
        'base_url' => env('ORDINALS_URL', 'https://ordinals.com'),
    ],

];
