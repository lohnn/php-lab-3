<?php

namespace model\user;

/**
 * Stores the users.
 */
class UserList
{

    /**
     * @var UserModel[]
     */
    private $users;

    public function __construct()
    {
        $this->userModel = array("admin" => new User("admin",
            '$2y$10$SPVJZ03/7W5C7CXh0b33Z.KIZg80cAwNtIcctDcBs02AWiHcCUKAy'));
    }

    public function getUsers()
    {
        return $this->userModel;
    }
}
