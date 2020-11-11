<?php


namespace Money\model;


class Wallet
{
    protected $id;
    protected $name;
    protected $balance;
    protected $currency;
    protected $userId;
    protected $category;

    /**
     * Wallet constructor.
     * @param $name
     * @param $balance
     * @param $currency
     * @param $userId
     * @param $category
     */
    public function __construct($name, $balance, $currency, $userId, $category)
    {
        $this->name = $name;
        $this->balance = $balance;
        $this->currency = $currency;
        $this->userId = $userId;
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setImg($category): void
    {
        $this->category = $category;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param mixed $balance
     */
    public function setBalance($balance): void
    {
        $this->balance = $balance;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }


}