<?php

return [
    'application' => [
        'controllersDir' => __DIR__ . '/../app/Http/Controllers',
        'logsDir'        => __DIR__ . '/../storage/logs/',
        'baseUri'        => '/',
    ],
    'elastic' => [
        'host'   =>  getenv('ES_HOST'),
        'port'   =>  getenv('ES_PORT'),
        'scheme' =>  getenv('ES_SCHEME'),
        'user'   =>  getenv('ES_USER'),
        'pass'   =>  getenv('ES_PASS')
    ]
];
