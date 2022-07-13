<?php

namespace Controller;

isset($_SESSION) ? '':session_start();

class Login {

    public function get() {
        echo \View\Loader::make()->render("./templates/login.twig");
    }

    public function post() {
        //Setting global session variables
        $username = $_POST["username"];
        $password = $_POST["password"];
        $password = hash("sha256",$password);
        
        //Flag checks for username and password FOR THE USER in db
        $flag = \Model\Verify::user_verify($username,$password);
        if($flag == null)
        {
            //If the login is not by user, flag2 checks for LOGIN BY ADMIN in db.
            $flag2 = \Model\Verify::admin_verify($username,$password);
            if($flag2 == null){

                //If the login is invalid.
                echo "You are not a user. Please signup";
                echo \View\Loader::make()->render("templates/login.twig");
            }
            else
            {
                //Setting session variables for ADMIN
                $_SESSION["username_ad"] = $username;
                $_SESSION["password_ad"] = $password;

                //Get method for Admin Homepage
                $call = new \Controller\ad_Home();
                $call->get();
            }
        }
        else
        {
            //Setting session variables for USER
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;

            //Get method for User Homepage
            $call = new \Controller\Home();
            $call->get();
        }
    }
}