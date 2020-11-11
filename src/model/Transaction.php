<?php


namespace Money\model;


class Transaction
{
    protected $id;
    protected $categoryId;
    protected $price;
    protected $comment;
    protected $walletId;

    /**
     * Transaction constructor.
     * @param $categoryId
     * @param $price
     * @param $comment
     * @param $walletId
     */
    public function __construct($categoryId, $price, $comment, $walletId)
    {
        $this->categoryId = $categoryId;
        $this->price = $price;
        $this->comment = $comment;
        $this->walletId = $walletId;
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
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param mixed $categoryId
     */
    public function setCategoryId($categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getWalletId()
    {
        return $this->walletId;
    }

    /**
     * @param mixed $walletId
     */
    public function setWalletId($walletId): void
    {
        $this->walletId = $walletId;
    }


}