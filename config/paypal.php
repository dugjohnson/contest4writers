<?php
/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

return [
    'mode'    => env('PAYPAL_MODE', 'sandbox'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'sandbox' => [
        'client_id'         => env('PAYPAL_SANDBOX_CLIENT_ID', ''),
        'client_secret'     => env('PAYPAL_SANDBOX_CLIENT_SECRET', ''),
        'app_id'            => 'KODContest-Sandbox',
    ],
    'live' => [
        'client_id'         => env('PAYPAL_LIVE_CLIENT_ID', 'Ad9JRUTfFYjeb1Brds7etUJnVFjAc2L7jjcLxJF9TryrrZKp6C_a2u5dYbr0EhIxKPkyQvb90uEijdXM'),
        'client_secret'     => env('PAYPAL_LIVE_CLIENT_SECRET', 'EBLlfcI9xW0XwbjQv9_9HgIiIfgxql8PQZAI4anaoZZ8pYY2Nux3CT4nGuwtma7sqRDDhb8fHz-kuX0f'),
        'app_id'            => env('PAYPAL_LIVE_APP_ID', 'KODContest'),
    ],

    'payment_action' => env('PAYPAL_PAYMENT_ACTION', 'Sale'), // Can only be 'Sale', 'Authorization' or 'Order'
    'currency'       => env('PAYPAL_CURRENCY', 'USD'),
    'notify_url'     => env('PAYPAL_NOTIFY_URL', ''), // Change this accordingly for your application.
    'locale'         => env('PAYPAL_LOCALE', 'en_US'), // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
    'validate_ssl'   => env('PAYPAL_VALIDATE_SSL', true), // Validate SSL when creating api client.
];
