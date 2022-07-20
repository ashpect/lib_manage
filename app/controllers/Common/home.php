<?php

namespace Controller;

//Both codes below are same. M2 is syntactically compact.
// M1 : 
// if (!isset($_SESSION)) {
//     session_start();
// };
// M2 : 
isset($_SESSION) ? '' : session_start();

class Home
{
    public function get()
    {
        //Checking for valid USER session
        $call = \Controller\Authenticate::authUser();
        if (!$call) {
            return;
        }
        //Rendering Home page for user.
        echo \View\Loader::make()->render("templates/home.twig", array(

            //Getting 3 tables in Home page representing current issues books and books pending for checkin and checkout requests.
            "checkins" => \Model\Post::checkinRequest($_SESSION['username']),
            "checkouts" => \Model\Post::checkoutRequest($_SESSION['username']),
            "posts" => \Model\Post::getAllCurrent($_SESSION['username']),

        ));
    }
}

class AdHome
{

    public function get()
    {
        //Checking for valid ADMIN session
        $call = \Controller\Authenticate::authAdmin();
        if (!$call) {
            return;
        }
        //Rendering Home page for admin
        echo \View\Loader::make()->render("templates/admin_home.twig");
    }
}
