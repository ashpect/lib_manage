<?php

namespace Model;

// Functions to be written :
// 1.approve_issue function
// 2.approve_return function


class  admin_func {

    public static function checkout_req() {
        $db = \DB::get_instance();
        
        $stmt = $db->prepare('SELECT * from checkouts inner join books on checkouts.book_id = books.bookid where checkout_adminid is null');
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public static function checkin_req() {
        $db = \DB::get_instance();
        
        $stmt = $db->prepare('SELECT * from checkouts inner join books on checkouts.book_id = books.bookid where checkin_adminid is null and checkin_time is not null');
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public static function addbook($title,$author,$numberofbooks){
        $db = \DB::get_instance();
        
        $stmt = $db->prepare('INSERT into books (title,author,numberofbooks) values(?,?,?)');
        $stmt->execute([$title,$author,$numberofbooks]);
    }

    public static function deletebook($id){
        $db = \DB::get_instance();
        
        $stmt = $db->prepare('DELETE from books where bookid = ?');
        $stmt->execute([$id]);
    }
}
