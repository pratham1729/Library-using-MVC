<?php

namespace Model;

class AdminRequests{
    public function add($bid,$bname){      
        $db = \DB::get_instance();
        $stmt = $db->prepare("insert into books values(?,?,null)");
        $stmt->execute([$bid,$bname]);        
    }

    public function remove($bid){      
        $db = \DB::get_instance();
        $stmt = $db->prepare("delete from books where bid=?");
        $stmt->execute([$bid]);        
    }

    public function issue_accept($bid,$username){
        $db = \DB::get_instance();
        $stmt = $db->prepare("delete from bookrequests where bid=? and requested_by=?");
        $stmt->execute([$bid,$username]);

        $stmt= $db->prepare("update books set issued_by=? where bid=?");
        $stmt->execute([$username,$bid]);
    }
    public function issue_decline($bid,$username){
        $db = \DB::get_instance();
        $stmt = $db->prepare("delete from bookrequests where bid=? and requested_by=?");
        $stmt->execute([$bid,$username]);
    }

    public function return_accept($bid,$username){
        $db = \DB::get_instance();
        $stmt = $db->prepare("delete from bookrequests where bid=? and requested_by=?");
        $stmt->execute([$bid,$username]);

        $stmt= $db->prepare("update books set issued_by=null where bid=?");
        $stmt->execute([$bid]);
    }

    public function approve_admin($username,$password){
        $db = \DB::get_instance();
        $stmt = $db->prepare("delete from adminregister name=?");
        $stmt->execute([$username]);

        $stmt= $db->prepare("insert into users values(?,?,1)");
        $stmt->execute([$username,$password]);
    }

    public function deny_admin($username,$password){
        $db = \DB::get_instance();
        $stmt = $db->prepare("delete from adminregister where name=?");
        $stmt->execute([$username]);
    }

}