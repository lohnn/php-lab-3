<?php
session_start();

function login($username, $password) {
	include_once 'users.php';
	$userCheck = new \users\Users();
	if ($userCheck -> checkUser($username, $password)) {
		return True;
	} else {
		return False;
	}
}

function isLoggedIn() {
	if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
		if (login($_SESSION['username'], $_SESSION['password'])) {
			return True;
		} else {
			session_destroy();
			return False;
		}
	}
}

function cookieLogin() {
	if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
		if (login($_COOKIE['username'], $_COOKIE['password'])) {
			return True;
		} else {
			setcookie("username", "", time() - 3600);
			setcookie("password", "", time() - 3600);
			return False;
		}
	}
}

function logout() {
	session_destroy();
	setcookie("username", "", time() - 3600);
	setcookie("password", "", time() - 3600);
	header("location:?");
}
?>