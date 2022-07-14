<?php

namespace Controller;

isset($_SESSION) ? '':session_start();

class UserReturn {
    public function get() {
        $call = new \Controller\Home();
        $call->get();
    }
    public function post() {
        $id = $_POST["id"];
        \Model\UserBook::returnBook($id);
        $call = new \Controller\Home();
        $call->get();
    }
}

