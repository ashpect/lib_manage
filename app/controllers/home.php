<?php

namespace Controller;

//Both codes below are same. M2 is syntactically compact.

// M1 : 
// if (!isset($_SESSION)) {
//     session_start();
// };
// M2 : 
isset($_SESSION) ? '':session_start();

class Home {

    public function get() {
        //Checking for valid USER session.
        if (isset($_SESSION['username']) && isset($_SESSION['password'])) {

            //Rendering Home page for user.
            echo \View\Loader::make()->render("templates/home.twig", array(

                //Getting 3 tables in Home page representing current issues books and books pending for checkin and checkout requests.
                "checkins" => \Model\Post::checkin_request($_SESSION['username']),
                "checkouts" => \Model\Post::checkout_request($_SESSION['username']),
                "posts" => \Model\Post::get_all_current($_SESSION['username']),

            ));
        }
        else
        {
            //Calling login page in case of invalid get request.
            echo \View\Loader::make()->render("templates/login.twig");
        }
    }

}

class ad_Home{

    public function get() {
        //Checking for valid ADMIN session.
        if (isset($_SESSION['username_ad']) && isset($_SESSION['password_ad'])) {
            
            //Rendering Home page for admin
            echo \View\Loader::make()->render("templates/ad_home.twig");
        }
        else
        {
            //Calling login page in case of invalid get request.
            echo \View\Loader::make()->render("templates/login.twig");
        }
    }
}
