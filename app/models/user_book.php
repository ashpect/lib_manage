<?php

namespace Model;

// Functions :
// 1.returnBook
// 2.issueBook

class UserBook
{

    public static function returnBook($id)
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare('UPDATE checkouts set checkin_time = CURRENT_TIMESTAMP() where id = ?');
        $stmt->execute([$id]);
    }

    public static function updateFine($id, $fine)
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare('UPDATE checkouts set fine = ? where id = ?');
        $stmt->execute([$fine, $id]);
    }


    public static function issueBook($id)
    {
        $db = \DB::get_instance();

        $stmt2 = $db->prepare('UPDATE books set numberofbooks = numberofbooks-1 where bookid = ?');
        $stmt2->execute([$id]);

        $stmt = $db->prepare('INSERT into checkouts(user_id,book_id) values(?,?)');
        $stmt->execute([$_SESSION["username"], $id]);
    }
}
