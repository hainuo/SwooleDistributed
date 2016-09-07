<?php
/**
 * Created by PhpStorm.
 * User: tmtbe
 * Date: 16-7-15
 * Time: 下午4:49
 */
$config[ 'database' ] = [
	'active'         => 'test',
	'test'           => [
		'host'     => 'localhost',
		'user'     => 'root',
		'password' => '',
		'database' => 'wease',
	],
	'product'        => [
		'host'     => 'localhost',
		'user'     => 'root',
		'password' => '',
		'database' => 'wease',
	],
	'asyn_max_count' => 10,
];
return $config;