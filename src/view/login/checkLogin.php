<?php
session_start();
require "../../../vendor/autoload.php";


$userController = new \Money\controller\UserController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];
    $userController->login($username, $password);
} else {
    $userController->logOut();
}
