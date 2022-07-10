<?php

namespace Model;

class User {
    public static function find_user($username) {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM users WHERE name = ?");
        $stmt->execute([$username]);
        $row = $stmt->fetch();
        return $row;
    }

    public static function find_user_admin($username) {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM users WHERE name = ? and admin = 1");
        $stmt->execute([$username]);
        $row = $stmt->fetch();
        return $row;
    }

    public static function find_user_client($username) {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM users WHERE name = ? and admin = 0");
        $stmt->execute([$username]);
        $row = $stmt->fetch();
        return $row;
    }

    public static function add_user($username,$password,$level){
        $db=\DB::get_instance();
        $stmt=$db->prepare("insert into users values(?,?,?)");
        $stmt->execute([$username,$password,$level]);
    }

    public static function admin_request($username,$password){
        $db=\DB::get_instance();
        $stmt=$db->prepare("insert into adminregister values(?,?)");
        $stmt->execute([$username,$password]);
    }
}
