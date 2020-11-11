<?php


namespace Money\model;


class WalletCategoryModel
{
    protected $database;

    public function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect();
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM wallet_category';
        $stmt = $this->database->query($sql);
        return $stmt->fetchAll();
    }

    public function getIdByName($name)
    {
        $sql = 'SELECT id FROM wallet_category WHERE wallet_category_name = :name';
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':name',$name);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data['id'];
    }
}