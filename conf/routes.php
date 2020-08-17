<?php

Flight::route('/', function () {
    $foodsSql = "SELECT * FROM foods";
    $foods = Flight::db()->query($foodsSql);
    $categoriesSql = "SELECT * FROM foodcategories";
    $categories = Flight::db()->query($categoriesSql);
    Flight::render('homepage.php', array('foods' => $foods, 'categories' => $categories));
});

Flight::route('POST /login', ["auth", "login"]);
Flight::route('GET /logout', ["auth", "logout"]);
Flight::route('POST /register', ["auth", "register"]);
Flight::route('POST /writeUs', ["messageController", "sendMessage"]);
Flight::route('POST /subscribe', ["subscriptionController", "subscribe"]);
Flight::route('GET /panel', ["panelController", "showPanel"]);
Flight::route('GET /panel/menu', ["menuController", "showMenu"]);
Flight::route('GET /panel/menu/addCategory', ["menuController", "addCategory"]);
Flight::route('POST /panel/menu/addCategory/createFoodCategory', ["menuController", "createFoodCategory"]);
Flight::route('POST /panel/menu/deleteFoodCategory', ["menuController", "deleteFoodCategory"]);
Flight::route('GET /panel/food/@id', ["menuController", "viewFood"]);
Flight::route('POST /panel/food/@id', ["foodController", "updateFood"]);
Flight::route('POST /panel/addFood/', ["foodController", "addFood"]);
Flight::route('POST /panel/addFood/createFood', ["foodController", "createFood"]);
Flight::route('POST /panel/deleteFood', ["foodController", "deleteFood"]);

Flight::route('GET /panel/messages/@id', ["messageController", "viewMessage"]);
Flight::route('POST /panel/messages/@id', ["messageController", "deleteMessage"]);

Flight::route('POST /panel/users/@id', ["userController", "deleteUser"]);

Flight::route('POST /panel/orderProcessed', ["orderController", "orderProcessed"]);
Flight::route('POST /panel/orderDelete', ["orderController", "orderDeleted"]);
Flight::route('POST /order', ["orderController", "orderSubmit"]);
