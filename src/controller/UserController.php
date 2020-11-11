<?php
namespace Money\controller;

use Money\model\UserManager;
use Money\model\User;

class UserController
{
    protected $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
    }

    function login($username, $password)
    {
        $result = $this->userManager->getUser($username, $password);
        if (is_array($result)) {
            $_SESSION['isLogin'] = true;
            $_SESSION['userLogin'] = $result;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header('location:../../../index.php');
        } else {
            header('location:loginFail.php');
        }
    }

    function logOut()
    {
        session_destroy();
        header('location:index.php');
    }

    public function view()
    {
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        $item = $this->userManager->getUser($username,$password);
        $user = new User($username,$password);
        $user->setCreateDate($item['create_date']);
        include_once "src/view/view-user.php";
    }

    public function addUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fullname = $_REQUEST['fullname'];
            $username = $_REQUEST['username'];
            $email = $_REQUEST['email'];
            $password = $_REQUEST['password'];
            $this->userManager->addUser($fullname,$email,$username,$password);
            header('location:../../../index.php');
        }
    }
}