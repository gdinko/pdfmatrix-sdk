<?php

/*
 * You can place your custom package configuration in here.
 */
return [

    'api_token' => env('PDFMATRIX_API_TOKEN'),

    'base_url' => rtrim(env('PDFMATRIX_API_BASE_URL', 'https://pdfmatrix.com/api/v1/'), '/'),

    'timeout' => env('PDFMATRIX_API_TIMEOUT', 40),
];
