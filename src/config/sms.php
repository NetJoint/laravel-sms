<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Default SMS Provider
    |--------------------------------------------------------------------------
    |
    | Name of default SMS provider(lowercase).
    |
    */
    'default' => env('SMS_PROVIDER', 'yimei'),

    /*
    |--------------------------------------------------------------------------
    | Configuration of each SMS provider.
    |--------------------------------------------------------------------------
    |
    | Configuration of each SMS provider, key is the name of SMS provider.
    |
    */
    'providers' => [
        'yimei' => [
            // Yimei serial number
            'cdkey'    => env('SMS_YIMEI_CDKEY', '2SDK-EMY-6666-AAAAA'),
            // Yimei password
            'password' => env('SMS_YIMEI_PASSWORD', '123456')
        ]
    ]
];