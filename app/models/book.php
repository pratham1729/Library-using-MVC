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

    public function get_issuerequest(){
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM bookrequests where type='i'");
        $stmt->execute();
        $issuereq = $stmt->fetchAll();
        return $issuereq;
    }

    public function get_returnrequest(){
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM bookrequests where type='r'");
        $stmt->execute();
        $returnreq = $stmt->fetchAll();
        return $returnreq;
    }

    public function get_adminrequest(){
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM adminregister");
        $stmt->execute();
        $adminreq = $stmt->fetchAll();
        return $adminreq;
    }
}