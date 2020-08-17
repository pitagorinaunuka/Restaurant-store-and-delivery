<?php

function auth(){
	global $user;
	global $db;
	if(session_status() == PHP_SESSION_NONE){
		session_start();
	}

	if(!isset($_SESSION['email']) || !isset($_SESSION['password'])){
		if(session_status() !== PHP_SESSION_NONE){
			session_destroy();	
		}
		Flight::redirect('/');
	} else {
		$email = $_SESSION['email'];
		$password = $_SESSION['password'];
		$authQuery = "SELECT * FROM users WHERE email='$email' AND password='$password'";
		$user = $db->query($authQuery);
		foreach($user->fetchAll(PDO::FETCH_ASSOC) as $user){}
	}	
}






// if(!$authResult->num_rows == 1){
// 	session_destroy();
// 	Flight::redirect('/');
// }