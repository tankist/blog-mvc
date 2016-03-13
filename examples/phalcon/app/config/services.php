<?php

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

$di['exceptionPlugin'] = '\Plugin\Exception';
$di['authPlugin'] = '\Plugin\Auth';

return $di;