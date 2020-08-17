<?php

Flight::path("controllers/");

Flight::path("classes/");

Flight::register('auth','auth');

// Flight::register('db','mysqli',[$config['db']['host'], $config['db']['username'], $config['db']['password'], $config['db']['databasename']]);

// Flight::register('auth','auth');

// Flight::register('users','userController');

Flight::set("flight.base_url", $config['web']['base_url']);

