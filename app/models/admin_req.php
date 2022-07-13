<?php

namespace Model;


class  AdminReq {

    public static function approve_issue($id) {
        $db = \DB::get_instance();
        
        $stmt = $db->prepare('UPDATE checkouts set checkout_time = CURRENT_TIMESTAMP() where id = ?');
        $stmt->execute([$id]);
        
        $stmt2 = $db->prepare('UPDATE checkouts set checkout_adminid = ? where id = ?');
        $stmt2->execute([$_SESSION["username_ad"],$id]);
    }

    public static function approve_return($id) {
        $db = \DB::get_instance();

        $stmt = $db->prepare('UPDATE checkouts set checkin_adminid = ? where id = ?');
        $stmt->execute([$_SESSION["username_ad"],$id]);

        $stmt2 = $db->prepare('UPDATE checkouts inner join books on checkouts.book_id = books.bookid set numberofbooks = numberofbooks + 1 where id = ?');
        $stmt2->execute([$id]);
    }

    public static function deny_issue($id) {

        $db = \DB::get_instance();

        $stmt2 = $db->prepare('UPDATE checkouts inner join books on checkouts.book_id = books.bookid set numberofbooks = numberofbooks + 1 where id = ?');
        $stmt2->execute([$id]);

        $stmt = $db->prepare('DELETE from checkouts where id = ?');
        $stmt->execute([$id]);

    }

    public static function deny_return($id) {

        $db = \DB::get_instance();
        $stmt = $db->prepare('UPDATE checkouts set checkin_time = NULL where id = ?');
        $stmt->execute([$id]);

    }
    
}