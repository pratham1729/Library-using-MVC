<?php

namespace Model;

class ClientBooks{
    public function getIssued($username){
        $database = \Database::getInstance();
        $statement = $database->prepare("SELECT * FROM books WHERE issued_by= ?");
        $statement->execute([$username]);
        $row = $statement->fetchAll();
        return $row;        
    }

    public function getRequested($username){
        $database = \Database::getInstance();
        $statement = $database->prepare("SELECT distinct * FROM bookrequests WHERE requested_by = ?");
        $statement->execute([$username]);
        $row = $statement->fetchAll();
        return $row;
    }

    public function getAllBooks(){
        $database = \Database::getInstance();
        $statement = $database->prepare("SELECT * FROM books");
        $statement->execute();
        $allbooks = $statement->fetchAll();
        return $allbooks;
    }

    public function getIssueRequest(){
        $database = \Database::getInstance();
        $statement = $database->prepare("SELECT * FROM bookrequests where type='i'");
        $statement->execute();
        $issuereq = $statement->fetchAll();
        return $issuereq;
    }

    public function getReturnRequest(){
        $database = \Database::get_instance();
        $statement = $database->prepare("SELECT * FROM bookrequests where type='r'");
        $statement->execute();
        $returnreq = $statement->fetchAll();
        return $returnreq;
    }

    public function getAdminRequest(){
        $database = \Database::getInstance();
        $statement = $database->prepare("SELECT * FROM adminregister");
        $statement->execute();
        $adminreq = $statement->fetchAll();
        return $adminreq;
    }
}