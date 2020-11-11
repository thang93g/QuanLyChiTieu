<?php

use Money\controller\UserController;

require '../../../vendor/autoload.php';

$userController = new UserController();

$userController->addUser();
