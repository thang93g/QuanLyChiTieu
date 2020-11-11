<?php
namespace Money\mid;

class Auth
{
    function isLogin(){
        if (!isset($_SESSION['isLogin'])|| !$_SESSION['isLogin'] ){
            header('location:src/view/login/login.php');
        }
    }
}