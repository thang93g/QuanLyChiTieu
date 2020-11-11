<?php
namespace Money\model;
use PDO;

class DBConnect
{
    protected $dsn;
    protected $username;
    protected $password;

    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=meomeo;charset=utf8";
        $this->username = "root";
        $this->password = "Buoica1as";
    }

    public function connect()
    {
        return new PDO($this->dsn,$this->username,$this->password);
    }
}