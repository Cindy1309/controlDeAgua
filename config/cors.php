<?php

return [
    'paths' => [
        'api/*',        // Permitir CORS para todas las rutas bajo 'api/usuarios'
    ],
    'allowed_methods' => ['*'],    // Permitir todos los métodos HTTP
    'allowed_origins' => ['*'],    // Permitir todas las direcciones de origen (ajustar según sea necesario)
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],    // Permitir todos los headers
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,
];
