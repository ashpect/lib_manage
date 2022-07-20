<?php

namespace Controller;

isset($_SESSION) ? '' : session_start();

//Class to handle get requests for accessing ADD/DELETe BOOKS PAGE by ADMIN.
class Authenticate
{

    public static function authUser()
    {
        //Checking for valid session.
        if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
            return true;
        } else {
            echo "You are not an User.Please login";
            echo \View\Loader::make()->render("templates/login.twig");
            return false;
        }
    }

    public static function authAdmin()
    {
        //Checking for valid session.
        if (isset($_SESSION['username_ad']) && isset($_SESSION['password_ad'])) {
            return true;
        } else {
            echo "You are not an Admin.Please login";
            echo \View\Loader::make()->render("templates/login.twig");
            return false;
        }
    }

    public static function authCommon()
    {
        //Checking for valid session for common requests.
        if ((isset($_SESSION['username_ad']) && isset($_SESSION['password_ad'])) || (isset($_SESSION['username']) && isset($_SESSION['password']))) {
            return true;
        } else {
            echo "You are not an Admin.Please login";
            echo \View\Loader::make()->render("templates/login.twig");
            return false;
        }
    }
}
