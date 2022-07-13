<?php

namespace Model;

class Verify {

    public static function user_verify($username,$password) {
        $db = \DB::get_instance();
        $stmt = $db->prepare('SELECT * from users where username = ? and password = ? ');
        $stmt->execute([$username , $password]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public static function admin_verify($username,$password) {
        $db = \DB::get_instance();
        $stmt = $db->prepare('SELECT * from admins where username = ? and password = ? ');
        $stmt->execute([$username , $password]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public static function signup($username,$password) {
        $db = \DB::get_instance();
        $stmt = $db->prepare('INSERT into users(username,password) values(?,?)');
        $stmt->execute([$username , $password]);
    }
}
