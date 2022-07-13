<?php

namespace Controller;

isset($_SESSION) ? '':session_start();

class AdViewReq {

    public function get() {
        if (isset($_SESSION['username_ad']) && isset($_SESSION['password_ad'])) 
        {
            echo \View\Loader::make()->render("templates/ad_viewreq.twig", array(
                "checkoutbooks" => \Model\AdminFunc::checkout_req(),
                "checkinbooks" => \Model\AdminFunc::checkin_req(),
            ));
        }
        else
        {
            echo \View\Loader::make()->render("templates/not_admin.twig");
        }
    }

}

class ApproveIssue extends AdViewReq{

    public function get() {
        parent::get();
    }

    public function post(){
        if (isset($_SESSION['username_ad']) && isset($_SESSION['password_ad'])) 
        {
            $id = $_POST["id"];
            \Model\AdminReq::approve_issue($id);
            $call = new \Controller\AdViewReq();
            $call->get();
        }
        else
        {
            echo \View\Loader::make()->render("templates/not_admin.twig");
        }
    }
}

class DenyIssue extends AdViewReq{

    public function get() {
        parent::get();
    }

    public function post(){
        if (isset($_SESSION['username_ad']) && isset($_SESSION['password_ad'])) 
        {
            $id = $_POST["id"];
            \Model\AdminReq::deny_issue($id);
            $call = new \Controller\AdViewReq();
            $call->get();
        }
        else
        {
            echo \View\Loader::make()->render("templates/not_admin.twig");
        }
    }
}

class ApproveReturn extends AdViewReq{

    public function get() {
        parent::get();
    }

    public function post(){
        if (isset($_SESSION['username_ad']) && isset($_SESSION['password_ad'])) 
        {
            $id = $_POST["id"];
            \Model\AdminReq::approve_return($id);
            $call = new \Controller\AdViewReq();
            $call->get();
        }
        else
        {
            echo \View\Loader::make()->render("templates/not_admin.twig");
        }
    }
}

class DenyReturn extends AdViewReq{

    public function get() {
        parent::get();
    }
    
    public function post(){
        if (isset($_SESSION['username_ad']) && isset($_SESSION['password_ad'])) 
        {
            $id = $_POST["id"];
            \Model\AdminReq::deny_return($id);
            $call = new \Controller\AdViewReq();
            $call->get();
        }
        else
        {
            echo \View\Loader::make()->render("templates/not_admin.twig");
        }
    }
}

