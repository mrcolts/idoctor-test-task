<?php

return [
    'idoctor' => [
        'url' => env('IDOCTOR_URL'),
        'oauth' => [
            'grand_type' => env('IDOCTOR_GRAND_TYPE'),
            'client_id' => env('IDOCTOR_CLIENT_ID'),
            'client_secret' => env('IDOCTOR_CLIENT_SECRET'),
            'scope' => env('IDOCTOR_SCOPE'),
            'username' => env('IDOCTOR_USERNAME'),
            'password' => env('IDOCTOR_PASSWORD'),
        ]
    ]
];
