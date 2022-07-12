<?php

namespace Controller;

session_start();

class User_issue {
    public function get() {
        $call = new \Controller\Allbooks();
        $call->get();
    }
    public function post() {
        $bookid = $_POST["bookid"];
        $booknumber = $_POST["booknumber"];

        \Model\User_book::issue_book($bookid,$booknumber);
        $call = new \Controller\Allbooks();
        $call->get();
    }
}
