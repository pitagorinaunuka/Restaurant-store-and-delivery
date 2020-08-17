<?php

Flight::route('GET /', function)({
	global $user;
	$test = 1;
	$user = Flight::get('user');
	print_r($user);
	die();
	if(isset($user)){
		Flight::render('../homepage.php', array('user' => $user, 'test' => $test));	
	} else {
		Flight::render('../homepage.php', array('test' => $test));	
	}

    
});

Flight::route('POST /register', function(){
	global $db;

	if(!isset($db)){
		die("Connection error. Please check DB access details.");
	}

	$request = Flight::request();
	$inputFields = count($request->data);
	if($inputFields !== 5){
		die('All fields are necessary.');
	}
	//query and exec
	$query = "INSERT INTO users (email, first_name, last_name, password) VALUES ('" . $request->data['email'] . "', '" . $request->data['first_name'] . "', '" . $request->data['last_name'] . "', '" . $request->data['password'] . "')";
	$result = $db->query($query);
	Flight::redirect('/');



});

Flight::route('POST /login', function(){
	global $db;
	if(!isset($db)){
		die("Connection error. Please check DB access details.");
	}
	$request = Flight::request();
	$inputFields = count($request->data);
	if($inputFields !== 2){
		die('All fields are necessary.');
	}
	$_SESSION['email'] = $request->data['email_login'];
	$_SESSION['password'] = $request->data['password_login'];
	$emailTemp = $_SESSION['email'];
	$passwordTemp = $_SESSION['password'];
	$loginQuery = "SELECT * FROM users WHERE email='$emailTemp' AND password='$passwordTemp'";
	$user = $db->query($loginQuery);
	$userTest = $user->fetchAll(PDO::FETCH_ASSOC);
	// foreach($user->fetchAll(PDO::FETCH_ASSOC) as $user){}
		if(count($userTest) !== 0){
			global $user;
			Flight::set('user', $userTest[0]);
			// $user = $userTest[0];
			Flight::redirect('/');

		} else {
			session_destroy();
			Flight::redirect('/');
		}
});

Flight::route('GET /logout', function(){
	if(session_status() !== PHP_SESSION_NONE){
		session_destroy();	
	} else {
		session_start();
		session_destroy();
	}
	

	Flight::redirect('/');
});