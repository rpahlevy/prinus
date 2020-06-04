<?php

// load .env
$dotenv = new Dotenv\Dotenv(__DIR__ .'/../');
$dotenv->load();
function env($key, $defaultValue='') {
    return isset($_ENV[$key]) ? $_ENV[$key] : $defaultValue;
}

return [
    'settings' => [
        'displayErrorDetails' => env('APP_ENV', 'local') != 'production',
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
        'debugMode' => env('APP_DEBUG', 'true') == 'true',
        'upload_directory' => __DIR__ . '/uploads', // upload directory

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
            'cache_path' => env('APP_ENV', 'local') != 'production' ? '' : __DIR__ . '/../cache/'
        ],

        // Monolog settings
        'logger' => [
            'name' => env('APP_NAME', 'App'),
            'path' => env('docker') ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        // Database
        'db' => [
            'connection' => env('DB_CONNECTION'),
            'host' => env('DB_HOST'),
            'port' => env('DB_PORT'),
            'database' => env('DB_DATABASE'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
        ],
        'jwt' => [
            'secret' => env('SECRET')
        ]
    ],
];
