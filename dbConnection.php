<?php

Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=pizza_restaurant_db','root',''));
$db = Flight::db();