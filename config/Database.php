<?php

class Database {

    private $dbhost = "localhost";
    private $dbname = "youdemy";
    private $dbusername = "root";
    private $dbpassword = "";

    public function connect(){
        try {
            $pdo = new PDO("mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname ,$this->dbusername,$this->dbpassword);
            $pdo->setAttribute(PDO::ERRMODE_EXCEPTION,PDO::ATTR_ERRMODE);
            return $pdo;

        }
        catch(PDOException $e){
            die("Connection to database failed : " . $e->getmessage());
        }

    }

}