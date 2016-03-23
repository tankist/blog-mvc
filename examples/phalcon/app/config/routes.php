<?php

$router = new \Phalcon\Mvc\Router(true);

$router->setDefaults([
	'namespace' => 'Controller',
	'controller' => 'index',
	'action' => 'index',
]);

$authGroup = new \Phalcon\Mvc\Router\Group([
    'namespace' => 'Controller',
    'controller' => 'auth',
]);

$authGroup->addGet('/signin', [
    'action' => 'signIn',
])->setName('signIn');

$authGroup->addGet('/signup', [
    'action' => 'signUp',
])->setName('signUp');

$authGroup->addPost('/signin', [
    'action' => 'signInPost',
])->setName('signInPost');

$authGroup->addPost('/signup', [
    'action' => 'signUpPost',
])->setName('signUpPost');

$router->mount($authGroup);

return $router;