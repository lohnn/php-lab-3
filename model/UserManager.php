<?php

namespace model;

use model\user\User;
use model\user\UserList;

require_once 'user/UserList.php';

class UserManagement {

    /**
     * @var UserList
     */
    private $users;

    /**
     * @var boolean
     */
    private $loggedIn = false;

    private function getUser() {
        
    }

    public function __construct() {
        $this->users = new UserList();
    }

    /**
     * Checks if you are logged in
     * @return boolean True if logged in
     */
    public function isLoggedIn() {
        return $this->loggedIn;
    }

    /**
     * Log in as the user
     * @param \model\user\User $user
     * @return boolean
     */
    public function logIn(User $user) {
        foreach ($this->users->getUsers() as $value) {
            if ($user->compare($value)) {
                $this->loggedIn = true;
                return $this->loggedIn;
            }
        }
        return false;
    }

}
