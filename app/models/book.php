<?php

namespace Model;

class ClientBooks{
    public function getIssued($username){
        $database = \Database::getInstance();
        $statement = $database->prepare("SELECT book_id,book_name,issued_by FROM books WHERE issued_by= ?");
        $statement->execute([$username]);
        $issued_books = $statement->fetchAll();
        return $issued_books;        
    }

    public function getRequested($username){
        $database = \Database::getInstance();
        $statement = $database->prepare("SELECT distinct book_id,book_name,requested_by,type FROM bookrequests WHERE requested_by = ?");
        $statement->execute([$username]);
        $requested_books = $statement->fetchAll();
        return $requested_books;
    }

    public function getAllBooks(){
        $database = \Database::getInstance();
        $statement = $database->prepare("SELECT book_id,book_name,issued_by FROM books");
        $statement->execute();
        $all_books = $statement->fetchAll();
        return $all_books;
    }

    public function getIssueRequest(){
        $database = \Database::getInstance();
        $statement = $database->prepare("SELECT distinct book_id,book_name,requested_by FROM bookrequests where type='Issue'");
        $statement->execute();
        $issue_req = $statement->fetchAll();
        return $issue_req;
    }

    public function getReturnRequest(){
        $database = \Database::getInstance();
        $statement = $database->prepare("SELECT distinct book_id,book_name,requested_by FROM bookrequests where type='Return'");
        $statement->execute();
        $return_req = $statement->fetchAll();
        return $return_req;
    }

    public function getAdminRequest(){
        $database = \Database::getInstance();
        $statement = $database->prepare("SELECT name,password,salt FROM adminregister");
        $statement->execute();
        $admin_req = $statement->fetchAll();
        return $admin_req;
    }
}

?>