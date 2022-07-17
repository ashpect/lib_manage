<?php

namespace Controller;

isset($_SESSION) ? '':session_start();

class UserReturn {
    public function get() {
        if (isset($_SESSION['username']) && isset($_SESSION['password'])) 
        {
            $call = new \Controller\Home();
            $call->get();
        }
        else
        {
            echo \View\Loader::make()->render("templates/not_admin.twig");
        }
    }
    public function post() {
        if (isset($_SESSION['username']) && isset($_SESSION['password'])) 
        {
            $id = $_POST["id"];
            \Model\UserBook::returnBook($id);
            $call = new \Controller\Home();
            $call->get();
        }
        else
        {
            echo \View\Loader::make()->render("templates/not_admin.twig");
        }
    }   
}