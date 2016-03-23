<?php

require __DIR__ . '/../../vendor/autoload.php';

$di = require __DIR__ . '/services.php';

return new \Phalcon\Mvc\Application($di);
