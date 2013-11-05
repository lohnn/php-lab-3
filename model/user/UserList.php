<?php

namespace model\user;

/**
 * Stores the users.
 */
class UserList {

    /**
     * @var UserModel[]
     */
    private $users;

    public function __construct() {
        $this->userModel = array(new User("Admin", "e7cf3ef4f17c3999a94f2c6f612e8a888e5b1026878e4e19398b23bd38ec221a"));
    }

    public function getUsers() {
        return $this->userModel;
    }

}
