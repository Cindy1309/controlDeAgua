<?php

return [
    'paths' => [
        'api/usuarios/*',        // Permitir CORS para todas las rutas bajo 'api/usuarios'
        'api/casas/*',           // Permitir CORS para todas las rutas bajo 'api/casas'
        'sanctum/csrf-cookie',   // Permitir CORS para la ruta de CSRF de Sanctum (si usas Sanctum)
    ],
    'allowed_methods' => ['*'],    // Permitir todos los métodos HTTP
    'allowed_origins' => ['*'],    // Permitir todas las direcciones de origen (ajustar según sea necesario)
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],    // Permitir todos los headers
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];
