<?php

namespace Controller;

isset($_SESSION) ? '' : session_start();

class AdminSignUp
{

    public function get()
    {
        echo \View\Loader::make()->render("templates/admin_signup.twig");
    }

    public function post()
    {
        $username = $_POST["username_ad"];
        $password = $_POST["password_ad"];
        $confirmpassword = $_POST["confirmpassword"];

        if ($confirmpassword != $password) {
            echo "Passwords do not match. Please try again";
            echo \View\Loader::make()->render("templates/admin_signup.twig");
        } else {
            $password = hash("sha256", $password);
            \Model\Verify::adminSignup($username, $password);

            echo '<script>alert("Sign-Up Succesful.Welcome to Lib-Manage.")</script>';

            //Setting session variables for USER
            $_SESSION["username_ad"] = $username;
            $_SESSION["password_ad"] = $password;

            //Get method for User Homepage
            $call = new \Controller\AdHome();
            $call->get();
        }
    }
}
