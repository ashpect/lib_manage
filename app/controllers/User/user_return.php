<?php

namespace Controller;

isset($_SESSION) ? '' : session_start();

class UserReturn
{
    public function get()
    {
        //Checking for valid ADMIN session
        $call = \Controller\Authenticate::authUser();
        if (!$call) {
            return;
        }

        $call = new \Controller\Home();
        $call->get();
    }
    public function post()
    {
        //Checking for valid ADMIN session
        $call = \Controller\Authenticate::authUser();
        if (!$call) {
            return;
        }

        //Updating Checkout_time
        $id = $_POST["id"];
        \Model\UserBook::returnBook($id);
        $call = new \Controller\Home();
        $call->get();
    }
}
