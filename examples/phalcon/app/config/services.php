<?php

use Phalcon\Session\Adapter\Files as Session;
use Phalcon\Forms\Manager as FormsManager;

$config = require __DIR__ . '/config.php';

$di = new \Phalcon\DI\FactoryDefault();

$di['db'] = [
	'className' => '\Phalcon\Db\Adapter\Pdo\Mysql',
	'arguments' => [
		[
			'type' => 'parameter',
			'value' => $config->database->toArray(),
		]
	],
];

$di['router'] = function () use ($config) {
	return require __DIR__ . '/routes.php';
};

$di['url'] = function () use ($config, $di) {
	$url = new \Phalcon\Mvc\Url();
	$url->setBaseUri('/');
	return $url;
};

$di['volt'] = function ($view, $di) use ($config) {
	$volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);

	$voltOptions = !empty($config->volt) ? $config->volt->toArray() : [];
	$volt->setOptions(array_merge([
		'compiledPath' => __DIR__ . '/../cache/views/volt/',
		'compiledSeparator' => '-',
	], $voltOptions));

	return $volt;
};

$di['view'] = function () use ($config, $di) {
	$view = new \Phalcon\Mvc\View();

	$view
		->setViewsDir($config->application->viewsDir)
		->registerEngines(['.volt' => 'volt']);

	return $view;
};

$di['cookies'] = function () {
	$cookies = new \Phalcon\Http\Response\Cookies();
	$cookies->useEncryption(false);
	return $cookies;
};

$di['assets'] = function () {
	return require_once __DIR__ . '/assets.php';
};

// Register the flash service with custom CSS classes
$di['flash'] = function () {
	$flash = new \Phalcon\Flash\Direct(
		array(
			'error'   => 'alert alert-danger',
			'success' => 'alert alert-success',
			'notice'  => 'alert alert-info',
			'warning' => 'alert alert-warning'
		)
	);
	return $flash;
};
$di['flashSession'] = function () {
	$flash = new \Phalcon\Flash\Session(
		array(
			'error'   => 'alert alert-danger',
			'success' => 'alert alert-success',
			'notice'  => 'alert alert-info',
			'warning' => 'alert alert-warning'
		)
	);
	return $flash;
};

$di['session'] = function () {
	$session = new Session();
	$session->start();
	return $session;
};

$di['forms'] = function () {
	$formsManager = new FormsManager();
	$forms = (array) @include __DIR__ . '/forms.php';
	foreach ($forms as $name => $form) {
		$formsManager->set($name, $form);
	}
	return $formsManager;
};

$di['exceptionPlugin'] = '\Plugin\Exception';
$di['authPlugin'] = '\Plugin\Auth';

return $di;