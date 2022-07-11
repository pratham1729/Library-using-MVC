<?php

namespace Model;

class ClientRequests {
    public function make_request($bookid,$bname,$username,$type){
        $db = \DB::get_instance();
        $stmt = $db->prepare("insert into bookrequests values(?,?,?,?)");
        $stmt->execute([$bookid,$bname,$username,$type]);
    }

    public function delete_request($bookid,$username){
        $db = \DB::get_instance();
        $stmt = $db->prepare("delete from bookrequests where bid=? and requested_by=?");
        $stmt->execute([$bookid,$username]);
    }
}

