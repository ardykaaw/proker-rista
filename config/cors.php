<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Laravel CORS Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for CORS (Cross-Origin Resource Sharing).
    | For more information about configuring CORS in your application, visit:
    | https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'images/*'], // Anda bisa menambahkan rute lainnya yang perlu akses CORS

    'allowed_methods' => ['*'], // Semua metode HTTP seperti GET, POST, PUT, DELETE

    'allowed_origins' => ['*'], // Menyediakan akses untuk semua origin (Anda bisa mengganti '*' dengan domain tertentu jika dibutuhkan)

    'allowed_headers' => ['*'], // Menyediakan akses untuk semua headers

    'exposed_headers' => [], // Anda bisa menambahkan header tertentu yang ingin diekspos

    'max_age' => 0, // Durasi cache preflight request (0 untuk tidak di-cache)

    'supports_credentials' => false, // Apakah mendukung pengiriman kredensial seperti cookies, otentikasi, dll
];
