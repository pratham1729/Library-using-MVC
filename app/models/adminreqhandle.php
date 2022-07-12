<?php

namespace Model;

class AdminRequests{
    public function add($bid,$bname){      
        $database = \Database::getInstance();
        $statement = $database->prepare("insert into books values(?,?,null)");
        $statement->execute([$bid,$bname]);        
    }

    public function remove($bid){      
        $database = \Database::getInstance();
        $statement = $database->prepare("delete from books where bid=?");
        $statement->execute([$bid]);        
    }

    public function issueAccept($bid,$username){
        $database = \Database::getInstance();
        $statement = $database->prepare("delete from bookrequests where bid=? and requested_by=?");
        $statement->execute([$bid,$username]);

        $statement= $database->prepare("update books set issued_by=? where bid=?");
        $statement->execute([$username,$bid]);
    }

    public function issueDecline($bid,$username){
        $database = \Database::getInstance();
        $statement = $database->prepare("delete from bookrequests where bid=? and requested_by=?");
        $statement->execute([$bid,$username]);
    }

    public function returnAccept($bid,$username){
        $database = \Database::getInstance();
        $statement = $database->prepare("delete from bookrequests where bid=? and requested_by=?");
        $statement->execute([$bid,$username]);

        $statement= $database->prepare("update books set issued_by=null where bid=?");
        $statement->execute([$bid]);
    }

    public function approveAdmin($username,$password,$salt){
        $database = \Database::getInstance();
        $statement = $database->prepare("delete from adminregister where name=?");
        $statement->execute([$username]);

        $statement= $database->prepare("insert into users values(?,?,1,?)");
        $statement->execute([$username,$password,$salt]);
    }

    public function denyAdmin($username,$password){
        $database = \Database::getInstance();
        $statement = $database->prepare("delete from adminregister where name=?");
        $statement->execute([$username]);
    }

}