<?php

namespace Model;

class ClientRequests {
    public function makeRequest($book_id,$book_name,$username,$type){
        $database = \Database::getInstance();
        $statement = $database->prepare("insert into bookrequests values(?,?,?,?)");
        $statement->execute([$book_id,$book_name,$username,$type]);
    }

    public function deleteRequest($book_id,$username){
        $database = \Database::getInstance();
        $statement = $database->prepare("delete from bookrequests where book_id=? and requested_by=?");
        $statement->execute([$book_id,$username]);
    }
}

?>