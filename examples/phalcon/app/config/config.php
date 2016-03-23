<?php

defined('APPLICATION_PATH') or define('APPLICATION_PATH', __DIR__ . '/..');

$local = (array) @include __DIR__ . '/config.local.php';

$config = [
	'database' => [
		'adapter' => 'Mysql',
		'host' => 'localhost',
		'username' => 'blog',
		'password' => 'blog',
		'dbname' => 'blog',
		'charset' => 'utf8',
	],
	'volt' => [
		'compileAlways' => false,
	],
	'application' => [
		'viewsDir' => APPLICATION_PATH . '/views/',
		'cacheDir' => APPLICATION_PATH . '/cache/',
		'modelsDir' => APPLICATION_PATH . '/models/',
	],
];

return new \Phalcon\Config(array_replace_recursive($config, $local));