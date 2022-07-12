<?php

namespace Model;

// Functions to be written :
// 1.issue function
// 2.return function


class User_book {

    public static function return_book($checkinid) {
        $db = \DB::get_instance();
        $stmt = $db->prepare('UPDATE checkouts set checkin_time = CURRENT_TIMESTAMP() where id = ?');
        $stmt->execute([$checkinid]);
    }

    public static function issue_book($id,$number) {
        $db = \DB::get_instance();
        if($number > 0){

            $stmt2 = $db->prepare('UPDATE books set numberofbooks = numberofbooks-1 where bookid = ?');
            $stmt2->execute([$id]);

            $stmt = $db->prepare('INSERT into checkouts(user_id,book_id) values(?,?)');
            $stmt->execute([$_SESSION["username"],$id]);
        }
    }

}
