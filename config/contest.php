<?php

return [
    'contest_year' => 2021,
    'paypal' => [
        'username' => env('PAYPAL_USERNAME'),
        'password' => env('PAYPAL_PASSWORD'),
        'signature' => env('PAYPAL_SIGNATURE'),
        'clientid' => env('PAYPAL_CLIENTID'),
        'secret' => env('PAYPAL_SECRET'),
        'sandbox' => env('PAYPAL_SANDBOX')
    ],
];
