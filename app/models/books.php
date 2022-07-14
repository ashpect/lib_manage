<?php

namespace Model;

class Books {
    public static function getAllBooks() {
        $db = \DB::get_instance();
        $stmt = $db->prepare('SELECT * from books');
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
}
