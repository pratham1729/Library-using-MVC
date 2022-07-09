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
}
