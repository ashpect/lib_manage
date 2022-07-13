<?php

namespace Controller;

isset($_SESSION) ? '':session_start();

class User_return {
    public function get() {
        $call = new \Controller\Home();
        $call->get();
    }
    public function post() {
        $id = $_POST["id"];
        \Model\User_book::return_book($id);
        $call = new \Controller\Home();
        $call->get();
    }
}

