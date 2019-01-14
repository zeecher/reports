<?php

require __DIR__.'/../vendor/autoload.php';

use App\Bootstrap;

include dirname(dirname(__FILE__)) . '/bootstrap/autoload.php';

$bootstrap = new Bootstrap(dirname(dirname(__FILE__)));

$bootstrap->run();

