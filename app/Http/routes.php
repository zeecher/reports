<?php


/**
 * Bets routes
 */
$bets = new \Phalcon\Mvc\Micro\Collection();

$bets
    ->setHandler(new \App\Http\Controllers\BetsController())
    ->setPrefix('/bets');


$bets->get('/', 'index');

$bets->get('/{id:[0-9]+}', 'show');

$bets->post('/', 'store');

$bets->put('/{id:[0-9]+}', 'update');

$bets->patch('/{id:[0-9]+}', 'patch');

$bets->delete('/{id:[0-9]+}', 'delete');


/**
 * Tickets routes
 */
$tickets = new \Phalcon\Mvc\Micro\Collection();

$tickets
    ->setHandler(new \App\Http\Controllers\TicketsController())
    ->setPrefix('/tickets');

$tickets->get('/', 'index');

$tickets->get('/{id:[0-9]+}', 'show');

$tickets->post('/', 'store');

$tickets->put('/{id:[0-9]+}', 'update');

$tickets->patch('/{id:[0-9]+}', 'patch');

$tickets->delete('/{id:[0-9]+}', 'delete');


return [

    $bets,
    $tickets
];


