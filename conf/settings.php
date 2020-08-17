<?php

include 'classes/auth.php';
include 'classes/user.php';
include 'classes/subscription.php';
include 'classes/message.php';
include 'classes/foodCategory.php';
include 'classes/food.php';
include 'controllers/menuController.php';
include 'controllers/panelCount.php';
include 'controllers/panelController.php';
include 'controllers/messageController.php';
include 'controllers/subscriptionController.php';
include 'controllers/foodController.php';
include 'controllers/userController.php';
include 'controllers/orderController.php';

Flight::register('db', 'mysqli', [$config['db']['host'], $config['db']['username'], $config['db']['password'], $config['db']['databasename']]);

Flight::register('auth', 'auth');

Flight::register('util', 'util');

Flight::register('user', 'user');

Flight::register('subscription', 'subscription');

Flight::register('message', 'message');

Flight::register('panelCount', 'panelCount');

Flight::set("flight.base_url", $config['web']['base_url']);
