<?php

require_once 'vendor/autoload.php';

$loop = \React\EventLoop\Factory::create();

$loop->addTimer(1, function () {
    echo "1 segundo \n";
});

$loop->run();