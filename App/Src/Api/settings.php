<?php
return [
    'settings' => [
        'key' => 'keySettins',
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
        'determineRouteBeforeAppMiddleware' => true,
        'debug' => 1,
        'type_dev' => 'pro',
        'ip' => ['localhost'],
        // Doctrine
        'doctrine' => [
            'paths' => [dirname(dirname(dirname(__DIR__))) . '/App/Entities'],
            'params' => [
                'driver' => 'pdo_pgsql',
                'host' => 'localhost',
                'user' => 'admin',
                'password' => 'admin',
                'dbname' => 'pg_dev',
                'port' => '5432'
                ]
        ],
        'tokenkey' => '123',
        'paymentskey' => '234',
        // Phpmailer
        'phpmailer' => [
            'Host' => 'email@email.com',
            'CharSet' => 'UTF-8',
            'SMTPAuth' => true,
            'SMTPSecure' => 'tls',
            'Port' => 587,
//            'Username' => 'usr',
//            'Password' => 'pass',
            'Address' => 'contato@email.com.br',
            'From' => 'Ola',
            'SMTPDebug' => 2 // 0,1,2
        ]
    ]
];


