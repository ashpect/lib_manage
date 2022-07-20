<?php

namespace Model;

// Functions :
// 1.checkout_req 
// 2.checkin_req 
// 3.deletebook 
// 4.addbook


class  AdminFunc
{

    public static function checkoutReq()
    {
        $db = \DB::get_instance();

        $stmt = $db->prepare('SELECT id,title,author,numberofbooks,user_id from checkouts inner join books on checkouts.book_id = books.bookid where checkout_adminid is null');
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public static function checkinReq()
    {
        $db = \DB::get_instance();

        $stmt = $db->prepare('SELECT id,title,author,checkout_time,checkin_time,user_id,bookid from checkouts inner join books on checkouts.book_id = books.bookid where checkin_adminid is null and checkin_time is not null');
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public static function addBook($title, $author, $numberofbooks)
    {
        $db = \DB::get_instance();

        $stmt = $db->prepare('INSERT into books (title,author,numberofbooks) values(?,?,?)');
        $stmt->execute([$title, $author, $numberofbooks]);
    }

    public static function deleteBook($id)
    {
        $db = \DB::get_instance();

        $stmt = $db->prepare('DELETE from books where bookid = ?');
        $stmt->execute([$id]);
    }
}
