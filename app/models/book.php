<?php

namespace Model;

class ClientBooks{
    public function get_issued($username){
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM books WHERE issued_by= ?");
        $stmt->execute([$username]);
        $row = $stmt->fetchAll();
        return $row;        
    }

    public function get_requested($username){
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT distinct * FROM bookrequests WHERE requested_by = ?");
        $stmt->execute([$username]);
        $row = $stmt->fetchAll();
        return $row;
    }

    public function get_all_books(){
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM books");
        $stmt->execute();
        $allbooks = $stmt->fetchAll();
        return $allbooks;
    }

}