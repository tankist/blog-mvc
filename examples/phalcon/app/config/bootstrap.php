<?php

defined('APPLICATION_PATH') or define('APPLICATION_PATH', realpath(__DIR__ . '/..'));

require __DIR__ . '/../../vendor/autoload.php';

$di = require __DIR__ . '/services.php';

$application = new \Phalcon\Mvc\Application($di);

return $application;
