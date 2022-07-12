<?php

namespace Model;

class ClientRequests {
    public function makeRequest($bookid,$bname,$username,$type){
        $database = \Database::getInstance();
        $statement = $database->prepare("insert into bookrequests values(?,?,?,?)");
        $statement->execute([$bookid,$bname,$username,$type]);
    }

    public function deleteRequest($bookid,$username){
        $database = \Database::getInstance();
        $statement = $database->prepare("delete from bookrequests where bid=? and requested_by=?");
        $statement->execute([$bookid,$username]);
    }
}

