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
                "checkins" => \Model\Post::checkinRequest($_SESSION['username']),
                "checkouts" => \Model\Post::checkoutRequest($_SESSION['username']),
                "posts" => \Model\Post::getAllCurrent($_SESSION['username']),

            ));
        }
        else
        {
            //Calling login page in case of invalid get request.
            echo \View\Loader::make()->render("templates/login.twig");
        }
    }

}

class AdHome{

    public function get() {
        //Checking for valid ADMIN session.
        if (isset($_SESSION['username_ad']) && isset($_SESSION['password_ad'])) {
            
            //Rendering Home page for admin
            echo \View\Loader::make()->render("templates/admin_home.twig");
        }
        else
        {
            //Calling login page in case of invalid get request.
            echo \View\Loader::make()->render("templates/login.twig");
        }
    }
}
