<?php
namespace users;

class User {
	private $username;
	private $password;

	function __construct($username, $password) {
		$this -> username = $username;
		$this -> password = $password;
	}

	function __get($name) {
		return array("username" => $this -> username, "password" => $this -> password);
	}

	function __toString() {
		return $this -> username . ":" . $this -> password;
	}

}

class Users {
	private $users;
	function __construct() {
		$this -> users = array(new User("Admin", "e7cf3ef4f17c3999a94f2c6f612e8a888e5b1026878e4e19398b23bd38ec221a"));
	}

	function checkUser($username, $password) {
		if (in_array(new User($username, $password), $this -> users))
			return True;
		else
			return False;
	}

}
?>