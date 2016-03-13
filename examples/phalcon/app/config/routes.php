<?php

$router = new \Phalcon\Mvc\Router(true);

$router->setDefaults([
	'namespace' => 'Controller',
	'controller' => 'index',
	'action' => 'index',
]);

return $router;