<?php

namespace controller;

require_once 'model/UserManagement.php';

class Controller {

    /**
     * @var \model\UserManagement
     */
    private $userManagement;

    /**
     * @var \view\View
     */
    private $view;

    /**
     * Sets the view
     * @param \view\View $view
     */
    public function __construct(\view\View $view) {
        $this->view = $view;
        $this->userManagement = new \model\UserManagement();
    }

    public function runApplication() {
        if ($this->view->tryingToLogIn()) {
            if ($this->userManagement->logIn($this->view->getLoginInfo())) {
                
            }
        }
        if ($this->userManagement->isLoggedIn()) {
            $this->view->showLoggedInPage();
        } else {
            $this->view->showLoginPage();
        }
    }

}
