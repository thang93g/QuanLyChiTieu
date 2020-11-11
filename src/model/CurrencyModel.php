<?php


namespace Money\model;


class CurrencyModel
{
    protected $database;

    public function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect();
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM currencies';
        $stmt = $this->database->query($sql);
        return $stmt->fetchAll();
    }

    public function getIdByName($name)
    {
        $sql = 'SELECT id FROM currencies WHERE currency_name = :name';
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':name',$name);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data['id'];
    }
}