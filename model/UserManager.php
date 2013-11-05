<?php

namespace model;

require_once 'UserList.php';

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
        $this->users = new \model\UserList();
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
     * @param \model\User $user
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
