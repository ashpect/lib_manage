<?php

namespace Controller;

isset($_SESSION) ? '':session_start();

class SignUp {

    public function get() {
        echo \View\Loader::make()->render("templates/signup.twig");
    }

    public function post() {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];

        if($confirmpassword != $password )
        {
            echo "Passwords do not match. Please try again";
            echo \View\Loader::make()->render("templates/signup.twig");
        }
        else
        {
            $password = password_hash($password, PASSWORD_DEFAULT);
            \Model\Verify::signup($username,$password);
            echo "SIGN-UP SUCCESSFULL";
            echo \View\Loader::make()->render("templates/login.twig");
        }

    }
}