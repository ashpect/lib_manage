<?php

namespace Model;

class UserBook {

    public static function returnBook($checkin_id) {
        $db = \DB::get_instance();
        $stmt = $db->prepare('UPDATE checkouts set checkin_time = CURRENT_TIMESTAMP() where id = ?');
        $stmt->execute([$checkin_id]);
    }

    public static function issueBook($id) {
        $db = \DB::get_instance();

            $stmt2 = $db->prepare('UPDATE books set numberofbooks = numberofbooks-1 where bookid = ?');
            $stmt2->execute([$id]);

            $stmt = $db->prepare('INSERT into checkouts(user_id,book_id) values(?,?)');
            $stmt->execute([$_SESSION["username"],$id]);

    }

}
