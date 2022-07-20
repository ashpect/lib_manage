<?php

namespace Controller;

isset($_SESSION) ? '' : session_start();

class UserSignUp
{

    public function get()
    {
        echo \View\Loader::make()->render("templates/user_signup.twig");
    }

    public function post()
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];

        if ($confirmpassword != $password) {
            echo "Passwords do not match. Please try again";
            echo \View\Loader::make()->render("templates/user_signup.twig");
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            \Model\Verify::userSignup($username, $password);

            echo '<script>alert("Sign-Up Succesful.Welcome to Lib-Manage.")</script>';

            //Setting session variables for USER
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;

            //Get method for User Homepage
            $call = new \Controller\Home();
            $call->get();
        }
    }
}
