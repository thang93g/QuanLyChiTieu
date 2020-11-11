<?php


namespace Money\model;


class WalletModel
{
    protected $database;

    public function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect();
    }

    public function getAll($id)
    {
        $sql = 'SELECT wallets.id,wallets.wallet_name,wallets.balance,currencies.currency_name,currencies.sign,currencies.fullname,wallet_category.img_file,wallet_category.id as cid,wallets.wallet_category,wallets.currency_id
FROM wallets
INNER JOIN currencies
ON wallets.currency_id = currencies.id
INNER JOIN wallet_category
ON wallets.wallet_category = wallet_category.id
WHERE wallets.user_id = :id
ORDER BY wallets.id';
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function add($wallet)
    {
        $sql = 'INSERT INTO `wallets`( `wallet_name`, `balance`, `currency_id`, `wallet_category`, `user_id`) VALUES (:name,:balance,:currency,:category,:user_id)';
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':name',$wallet->getName());
        $stmt->bindParam(':balance',$wallet->getBalance());
        $stmt->bindParam(':currency',$wallet->getCurrency());
        $stmt->bindParam(':category',$wallet->getCategory());
        $stmt->bindParam(':user_id',$wallet->getUserId());
        $stmt->execute();
    }

    public function adjustBalance($balance,$id)
    {
        $sql = 'UPDATE `wallets` SET `balance`=:balance WHERE id = :id';
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':balance',$balance);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `wallets` WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
    }

    public function edit($wallet)
    {
        $sql = 'UPDATE `wallets` SET `wallet_name`=:name,`balance`=:balance,`currency_id`=:currency,`wallet_category`=:category WHERE id = :id';
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':name',$wallet->getName());
        $stmt->bindParam(':balance',$wallet->getBalance());
        $stmt->bindParam(':currency',$wallet->getCurrency());
        $stmt->bindParam(':category',$wallet->getCategory());
        $stmt->bindParam(':id',$wallet->getId());
        $stmt->execute();
    }
}