<?php
require __DIR__ . '/vendor/autoload.php';
session_start();
$auth = new \Money\mid\Auth();
$auth->isLogin();

$userController = new \Money\controller\UserController();
$walletController = new \Money\controller\WalletController();

$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : NULL;

switch ($page){
    case 'log-out':
        $userController->logOut();
        break;
    case 'wallets':
        $walletController->view();
        break;
    case 'add-wallet':
        $walletController->add();
        break;
    case 'adjust':
        $walletController->adjust();
        break;
    case 'delete-wallet':
        $walletController->delete();
        break;
    case 'edit-wallet':
        $walletController->edit();
        break;
    default:
        $walletController->show();
}


