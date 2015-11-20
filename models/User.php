<?php

class User
{
    private $dbh;
    public function __construct($host, $user, $pass, $db){
        $this->dbh = new PDO("mysql:host=" . $host . ";dbname=" . $db, $user, $pass);
    }
}