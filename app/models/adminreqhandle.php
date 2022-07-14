<?php

namespace Model;

class AdminRequests{
    public function add($book_id,$book_name){      
        $database = \Database::getInstance();
        $statement = $database->prepare("insert into books values(?,?,null)");
        $statement->execute([$book_id,$book_name]);        
    }

    public function remove($book_id){      
        $database = \Database::getInstance();
        $statement = $database->prepare("delete from books where bid=?");
        $statement->execute([$book_id]);        
    }

    public function issueAccept($book_id,$username){
        $database = \Database::getInstance();
        $statement = $database->prepare("delete from bookrequests where bid=? and requested_by=?");
        $statement->execute([$book_id,$username]);

        $statement= $database->prepare("update books set issued_by=? where bid=?");
        $statement->execute([$username,$book_id]);
    }

    public function issueDecline($book_id,$username){
        $database = \Database::getInstance();
        $statement = $database->prepare("delete from bookrequests where bid=? and requested_by=?");
        $statement->execute([$book_id,$username]);
    }

    public function returnAccept($book_id,$username){
        $database = \Database::getInstance();
        $statement = $database->prepare("delete from bookrequests where bid=? and requested_by=?");
        $statement->execute([$book_id,$username]);

        $statement= $database->prepare("update books set issued_by=null where bid=?");
        $statement->execute([$book_id]);
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

?>