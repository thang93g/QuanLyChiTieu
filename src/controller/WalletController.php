<?php


namespace Money\controller;


use Money\model\CurrencyModel;
use Money\model\WalletCategoryModel;
use Money\model\Wallet;
use Money\model\WalletModel;

class WalletController
{
    protected $walletModel;
    protected $categoryModel;
    protected $currencyModel;
    public $id;

    public function __construct()
    {
        $this->id = $_SESSION['userLogin']['id'];
        $this->walletModel = new WalletModel();
        $this->categoryModel = new WalletCategoryModel();
        $this->currencyModel = new CurrencyModel();
    }

    public function show()
    {
        $id = $_SESSION['userLogin']['id'];
        $wallets = $this->walletModel->getAll($id);
        include_once "src/view/wallet/list.php";
    }

    public function view()
    {
        $wallets = $this->walletModel->getAll($this->id);
        $categories = $this->categoryModel->getAll();
        $currencies = $this->currencyModel->getAll();
        include_once "src/view/wallet/view-wallet.php";
    }

    public function add()
    {
        $name = $_REQUEST['name'];
        $balance = $_REQUEST['balance'];
        $currency = $this->currencyModel->getIdByName($_REQUEST['currency']);
        $category = $this->categoryModel->getIdByName($_REQUEST['category']);
        $wallet = new Wallet($name, $balance, $currency, $this->id, $category);
        $this->walletModel->add($wallet);
        header('location:index.php?page=wallets');
    }

    public function adjust()
    {
        $id = $_REQUEST['id'];
        $balance = $_REQUEST['newBalance'];
        $this->walletModel->adjustBalance($balance,$id);
        header('location:index.php?page=wallets');
    }

    public function delete()
    {
        $id = $_REQUEST['id'];
        $this->walletModel->delete($id);
        header('location:index.php?page=wallets');
    }

    public function edit()
    {
        $id = $_REQUEST['wallet-id'];
        $name = $_REQUEST['newName'];
        $balance = $_REQUEST['newBalance'];
        $currency = $this->currencyModel->getIdByName($_REQUEST['newCurrency']);
        $category = $this->categoryModel->getIdByName($_REQUEST['newCategory']);
        $wallet = new Wallet($name, $balance, $currency, $this->id, $category);
        $wallet->setId($id);
        $this->walletModel->edit($wallet);
        header('location:index.php?page=wallets');
    }
}