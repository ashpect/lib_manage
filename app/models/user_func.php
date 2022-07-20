<?php

namespace Model;

// Functions :
// 1.getAllCurrent
// 2.getAllPrevs
// 3.checkinRequest
// 4.checkoutRequest

class Post
{

    public static function getAllCurrent($username)
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare('SELECT id,title,author,publisher,checkout_time from checkouts inner join books on checkouts.book_id = books.bookid where checkout_adminid is not null and checkin_time is null and user_id = ?');
        $stmt->execute([$username]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public static function getAllPrevs($username)
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare('SELECT title,author,publisher,checkout_time,checkin_time from checkouts inner join books on checkouts.book_id = books.bookid where checkin_adminid is not null and user_id = ?');
        $stmt->execute([$username]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public static function checkinRequest($username)
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare('SELECT id,title,author,publisher,checkout_time,checkin_time from checkouts inner join books on checkouts.book_id = books.bookid where checkin_adminid is null and checkin_time is not null and user_id = ?');
        $stmt->execute([$username]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public static function checkoutRequest($username)
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare('SELECT id,title,author,publisher from checkouts inner join books on checkouts.book_id = books.bookid where checkout_adminid is null and user_id = ?');
        $stmt->execute([$username]);
        $rows = $stmt->fetchAll();
        return $rows;
    }
}
