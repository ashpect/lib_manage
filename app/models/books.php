<?php

namespace Model;

// Functions :
// 1.getAllBooks

class Books
{
    public static function getAllBooks()
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare('SELECT bookid,title,author,publisher,numberofbooks from books');
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
}
