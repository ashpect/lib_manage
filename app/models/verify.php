<?php

namespace Model;

// Functions :
// 1.userVerify
// 2.adminVerify
// 3.signUp

class Verify
{

    public static function userVerify($username, $password)
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare('SELECT * from users where username = ? and password = ? ');
        $stmt->execute([$username, $password]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public static function adminVerify($username, $password)
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare('SELECT * from admins where username = ? and password = ? ');
        $stmt->execute([$username, $password]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public static function userSignUp($username, $password)
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare('INSERT into users(username,password) values(?,?)');
        $stmt->execute([$username, $password]);
    }

    public static function adminSignUp($username, $password)
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare('INSERT into admins(username,password) values(?,?)');
        $stmt->execute([$username, $password]);
    }
}
