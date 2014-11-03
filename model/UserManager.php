<?php

namespace model;

use model\user\User;
use model\user\UserList;

require_once 'user/UserList.php';

class UserManagement
{

    /**
     * @var UserList
     */
    private $users;

    /**
     * @var boolean
     */
    private $loggedIn = false;

    /**
     * Returns the userlist from users
     * @return array
     */
    private function getUsers()
    {
        return $this->users->getUsers();
    }

    public function __construct()
    {
        $this->users = new UserList();
    }

    /**
     * Checks if you are logged in
     * @return boolean True if logged in
     */
    public function isLoggedIn()
    {
        return $this->loggedIn;
    }

    /**
     * Log in as the user
     * @param \model\user\User $user
     * @return boolean
     */
    public function logIn(User $user)
    {
        if (array_key_exists($user->getUsername(), $this->getUsers())
            && password_verify($user->getPassword(), $this->getUsers()[$user->getUsername()]->getPassword())
        ) {
            return true;
        }
        return false;
    }

}
