<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Country
    |--------------------------------------------------------------------------
    | The default country code used when calling FakerAfricaFactory::create()
    | without arguments via the Laravel helper.
    | Supported: "BJ" (and more in upcoming versions)
    */
    'default_country' => env('FAKER_AFRICA_COUNTRY', 'BJ'),

    /*
    |--------------------------------------------------------------------------
    | Community Extensions
    |--------------------------------------------------------------------------
    | Register community-contributed providers here.
    | Each entry maps an ISO country code to a fully-qualified class name.
    |
    | Example:
    |   'XY' => \MyVendor\FakerXY\XYProvider::class,
    */
    'extensions' => [
        // 'XY' => \MyVendor\FakerXY\XYProvider::class,
    ],
];
