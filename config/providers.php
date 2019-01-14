<?php

use App\Providers;

return [
    Providers\DotenvProvider::class,
    Providers\EventManagerServiceProvider::class,
    Providers\ConfigServiceProvider::class,
    Providers\RequestServiceProvider::class,
    Providers\ResponseServiceProvider::class,
    Providers\RouterServiceProvider::class,
    Providers\ElasticsearchServiceProvider::class
];
