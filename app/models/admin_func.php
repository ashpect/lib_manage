<?php

namespace Model;

// Functions :
// 1.checkout_req function
// 2.checkin_req function
// 3.deletebook function
// 4.daddbookfunction


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
