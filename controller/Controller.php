<?php

namespace controller;

use model\UserManagement;
use view\View;

require_once './model/UserManager.php';

class Controller {

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
    public function __construct(View $view) {
        $this->view = $view;
        $this->userManagement = new UserManagement();
    }

    public function runApplication() {
        if ($this->view->tryingToLogIn()) {
            if ($this->userManagement->logIn($this->view->getLoginInfo())) {
                echo "HELLO";
            } else {
              echo "HI THERE";
            }
        }
        if ($this->userManagement->isLoggedIn()) {
            $this->view->showLoggedInPage();
        } else {
            $this->view->showLoginPage();
        }
    }

}
