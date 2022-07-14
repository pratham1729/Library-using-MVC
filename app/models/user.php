<?php

namespace Model;

class User {
    public static function findUser($username) {
        $database = \Database::getInstance();
        $statement = $database->prepare("SELECT * FROM users WHERE name = ?");
        $statement->execute([$username]);
        $user = $statement->fetch();
        return $user;
    }

    public static function findUserAdmin($username) {
        $database = \Database::getInstance();
        $statement = $database->prepare("SELECT * FROM users WHERE name = ? and admin = 1");
        $statement->execute([$username]);
        $user = $statement->fetch();
        return $user;
    }

    public static function findUserClient($username) {
        $database = \Database::getInstance();
        $statement = $database->prepare("SELECT * FROM users WHERE name = ? and admin = 0");
        $statement->execute([$username]);
        $user = $statement->fetch();
        return $user;
    }

    public static function addUser($username,$password,$level,$salt){
        $database=\Database::getInstance();
        $statement=$database->prepare("insert into users values(?,?,?,?)");
        $statement->execute([$username,$password,$level,$salt]);
    }

    public static function adminRequest($username,$password,$salt){
        $database=\Database::getInstance();
        $statement=$database->prepare("insert into adminregister values(?,?,?)");
        $statement->execute([$username,$password,$salt]);
    }
}

?>