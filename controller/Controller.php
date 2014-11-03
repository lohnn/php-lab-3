<?php

namespace controller;

use model\UserManagement;
use view\View;

require_once './model/UserManager.php';

class Controller
{

    /**
     * @var UserManagement
     */
    private $userManagement;

    /**
     * @var View
     */
    private $view;

    /**
     * Sets the view
     * @param View $view
     */
    public function __construct(View $view)
    {
        $this->view = $view;
        $this->userManagement = new UserManagement();
    }

    public function runApplication()
    {
        if ($this->view->tryingToLogIn()) {
            //Login successful
            if ($this->userManagement->logIn($this->view->getLoginInfo())) {
                $this->view->showLoggedInPage();
            } else {
                $this->view->showLoginPage();
            }
        } elseif ($this->view->tryingToLogOut()) {
            echo "IMMA LOG OUT!";
        }
        else {
            $this->view->showLoginPage();
        }
    }
}