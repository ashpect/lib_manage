<?php

namespace Controller;

session_start();

class ad_viewreq {

    public function get() {
        if (isset($_SESSION['username_ad']) && isset($_SESSION['password_ad'])) 
        {
            echo \View\Loader::make()->render("templates/ad_viewreq.twig", array(
                "checkoutbooks" => \Model\admin_func::checkout_req(),
                "checkinbooks" => \Model\admin_func::checkin_req(),
            ));
        }
        else
        {
            echo \View\Loader::make()->render("templates/not_admin.twig");
        }
    }

}

class approve_issue extends ad_viewreq{

    public function get() {
        parent::get();
    }

    public function post(){
        if (isset($_SESSION['username_ad']) && isset($_SESSION['password_ad'])) 
        {
            $id = $_POST["id"];
            \Model\admin_req::approve_issue($id);
            $call = new \Controller\Ad_viewreq();
            $call->get();
        }
        else
        {
            echo \View\Loader::make()->render("templates/not_admin.twig");
        }
    }
}

class deny_issue extends ad_viewreq{

    public function get() {
        parent::get();
    }

    public function post(){
        if (isset($_SESSION['username_ad']) && isset($_SESSION['password_ad'])) 
        {
            $id = $_POST["id"];
            \Model\admin_req::deny_issue($id);
            $call = new \Controller\Ad_viewreq();
            $call->get();
        }
        else
        {
            echo \View\Loader::make()->render("templates/not_admin.twig");
        }
    }
}

class approve_return extends ad_viewreq{

    public function get() {
        parent::get();
    }

    public function post(){
        if (isset($_SESSION['username_ad']) && isset($_SESSION['password_ad'])) 
        {
            $id = $_POST["id"];
            \Model\admin_req::approve_return($id);
            $call = new \Controller\Ad_viewreq();
            $call->get();
        }
        else
        {
            echo \View\Loader::make()->render("templates/not_admin.twig");
        }
    }
}

class deny_return extends ad_viewreq{

    public function get() {
        parent::get();
    }
    
    public function post(){
        if (isset($_SESSION['username_ad']) && isset($_SESSION['password_ad'])) 
        {
            $id = $_POST["id"];
            \Model\admin_req::deny_return($id);
            $call = new \Controller\Ad_viewreq();
            $call->get();
        }
        else
        {
            echo \View\Loader::make()->render("templates/not_admin.twig");
        }
    }
}

