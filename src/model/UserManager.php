<?php


namespace Money\model;


class UserManager
{
    protected $database;

    public function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect();
    }

    public function getUser($username, $password)
    {
        $sql = 'SELECT * FROM users WHERE username = :username AND password = :password';
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function addUser($fullname,$email, $username, $password)
    {
        $date = date('yy/m/d');
        $sql = 'INSERT INTO `users`(`fullname`,`email`, `username`, `password`, `create_date`) VALUES (:fullname,:email,:username,:password,:create_date)';
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':create_date', $date);
        $stmt->execute();
    }


}