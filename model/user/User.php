<?php

namespace model\user;

class User {

    /**
     * @var String
     */
    private $username;

    /**
     * @var String
     */
    private $password;

    /**
     * Creates a user
     * @param String $username
     * @param String $password
     */
    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function __toString() {
        return sprintf("%s : %s", $this->username, $this->password);
    }

    /**
     * Compares the inputted user with this user and returns true
     * if they are the same.
     * @param \model\User $user
     * @return boolean
     */
    public function compare(User $user) {
        return ((String) $user === (String) $this);
    }

}
