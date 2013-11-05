<?php

namespace view;

require_once 'model/User.php';

class View {

    private static $login = "log_in";
    private static $username = "username";
    private static $password = "password";

    public function __construct() {
        
    }

    private function loggingInPost() {
        return true;
    }

    private function loggingInCookie() {
        return true;
    }

    //private function loggingInSession(){}

    /**
     * Checks if you are trying to log in to the page,
     * either with post, cookies or session variable.
     * @return boolean
     */
    public function tryingToLogIn() {
        return (filter_input(INPUT_POST, self::$login) !== null);
    }

    /**
     * NOTE! Only use this after tryingToLogin returnes true!
     * Gets the login info as a user.
     * @return \model\User
     */
    public function getLoginInfo() {
        $username = filter_input(INPUT_POST, self::$username);
        $password = filter_input(INPUT_POST, self::$password);
        return new \model\User($username, $password);
    }

    /**
     * Returns a string with the current time and date specially formatted
     * @return string
     */
    private function getTimeAndDate() {
        $weekDayArray = array("Måndag", "Tisdag", "Onsdag", "Torsdag", "Fredag", "Lördag", "Söndag");
        $monthArray = array("Januari", "Februari", "Mars", "April", "Maj", "Juni", "Juli", "Augusti", "September", "Oktober", "November", "December");
        $toReturn = $weekDayArray[date("N") - 1] . ", den " . date("j") . " " . $monthArray[date("n") - 1] . " år ";
        $toReturn .= date("Y") . ". Klockan är [" . date("H:i:s") . "]";
        return $toReturn;
    }

    /**
     * Show page where you log in
     */
    public function showLoginPage() {
        $this->showPage("Logga in", '<form method="post">
    <div>
        <label for="username">Username:</label>
        <input type="text" id="' . self::$username . '" name="' . self::$username . '" value="" />
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="' . self::$password . '" name="' . self::$password . '" />
    </div>
    <label for="remember">Remember me:</label>
    <input type="checkbox" name="remember" id="remember" value="1" />
    <input type="hidden" name="' . self::$login . '" />
    <input type="submit" value="Log in" />
</form>');
    }

    /**
     * Page to show when logged in
     */
    public function showLoggedInPage() {
        $this->showPage("Logged in", '<div>
            <a href="?logout">Log out</a>
        </div>');
    }

    /**
     * Displays page on screen.
     * @param String $title Title of page
     * @param String $body Page body
     */
    private function showPage($title, $body) {
        $body .= $this->getTimeAndDate();
        $body .= "<br />";
        $body .= $this->tryingToLogIn() ? 'true' : 'false';
        echo '<!doctype html>
                <html lang="sv">
                <head>
                     <meta charset="utf-8">
                     <title>' . $title . '</title>
                     <meta name="description" content="The HTML5 Herald">
                     <meta name="author" content="SitePoint">
                     <link rel="stylesheet" href="css/style.css">
                 </head>
                 <body>
                 ' . $body . '
                 </body>
              </html>';
    }

}
