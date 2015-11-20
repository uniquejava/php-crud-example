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

    public function addUser($user)
    {
        $sth = $this->dbh->prepare("insert into users(name,email,mobile,address) VALUES (?,?,?,?)");
        var_dump($user);
        $sth->execute(array($user->name, $user->email, $user->mobile, $user->address));
        return json_encode($this->dbh->lastInsertId());
    }
}