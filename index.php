<?php
session_start();
require_once './view/View.php';
require_once './controller/Controller.php';

require_once './model/User.php';
$temp = new model\User("Testar", "lite");
$temp1 = new model\User("Testar", "litee");
$toPrint = $temp->compare($temp1) ? 'true' : 'false';

$page = new \view\View();
$controller = new controller\Controller($page);
$controller->runApplication();
?>


<!--<?php
include_once "user_management.php";
//require '/kint/Kint.class.php';
//Kint::dump($_COOKIE);

if (isLoggedIn()) {
    echo "Reloaded page and still logged in";
} else if (cookieLogin()) {
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['password'] = $_COOKIE['password'];
    echo "Logged in with cookies";
}

if (isset($_POST['log_in'])) {
    if ($_POST['username'] != "") {
        $password = hash('sha256', $_POST['password']);
        if (login($_POST['username'], $password)) {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $password;
            if (isset($_POST['remember']) && $_POST['remember'] == 1) {
                setcookie("username", $_POST['username'], time() + 60);
                setcookie("password", $password, time() + 60);
            }
            echo "Logged in";
        } else {
            session_destroy();
            echo "Couldn't log in, wrong username or password.";
        }
    } else {
        echo "Användarnamn saknas.";
    }
}

if (isset($_GET['logout'])) {
    logout();
}
?>

<!doctype html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <title>Lab1</title>
        <meta name="description" content="The HTML5 Herald">
        <meta name="author" content="SitePoint">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
<?php
if (isLoggedIn()) {
    include_once "logged_in.php";
} else
    include_once "login.php";
//Måndag, den 8 Juli år 2013. Klockan är [10:59:21]
?>
    </body>
</html>-->