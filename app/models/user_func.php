<?php

namespace Model;

class Post {

    public static function get_all_current($username) {
        $db = \DB::get_instance();
        // 'select books.* from chekouts inner join books on chekouts.book_id = books.id where user_id = "'+ session.userid +'"and admin_id is not null;'
        
        $stmt = $db->prepare('SELECT * from checkouts inner join books on checkouts.book_id = books.bookid where checkout_adminid is not null and checkin_time is null and user_id = ?');
        $stmt->execute([$username]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public static function get_all_prevs($username) {
        $db = \DB::get_instance();
        $stmt = $db->prepare('SELECT * from checkouts inner join books on checkouts.book_id = books.bookid where checkin_adminid is not null and user_id = ?');
        $stmt->execute([$username]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public static function checkin_request($username) {
        $db = \DB::get_instance();
        $stmt = $db->prepare('SELECT * from checkouts inner join books on checkouts.book_id = books.bookid where checkin_adminid is null and checkin_time is not null and user_id = ?');
        $stmt->execute([$username]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public static function checkout_request($username) {
        $db = \DB::get_instance();
        $stmt = $db->prepare('SELECT * from checkouts inner join books on checkouts.book_id = books.bookid where checkout_adminid is null and user_id = ?');
        $stmt->execute([$username]);
        $rows = $stmt->fetchAll();
        return $rows;
    }
}