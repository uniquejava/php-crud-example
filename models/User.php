<?php

class User
{
    private $dbh;
    public function __construct($host, $user, $pass, $db){
        $this->dbh = new PDO("mysql:host=" . $host . ";dbname=" . $db, $user, $pass);
    }

    public function getUsers()
    {
        $sth = $this->dbh->prepare("select * from users");
        $sth->execute();
        return json_encode($sth->fetchAll());
    }
}