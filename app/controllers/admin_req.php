<?php

namespace Controller;

isset($_SESSION) ? '':session_start();

//Class to handle get requests for accessing REQUESTS APPROVAL PAGE by ADMIN.
class AdViewReq {

    public function get() {
        if (isset($_SESSION['username_ad']) && isset($_SESSION['password_ad'])) 
        {
            echo \View\Loader::make()->render("templates/admin_viewreq.twig", array(
                "checkoutbooks" => \Model\AdminFunc::checkoutReq(),
                "checkinbooks" => \Model\AdminFunc::checkinReq(),
            ));
        }
        else
        {
            echo \View\Loader::make()->render("templates/not_admin.twig");
        }
    }

}

//Class to handle post requests for approval of checkout requests.
class ApproveIssue extends AdViewReq{

    public function get() {
        parent::get();
    }

    public function post(){
        if (isset($_SESSION['username_ad']) && isset($_SESSION['password_ad'])) 
        {
            $id = $_POST["id"];
            \Model\AdminReq::approveIssue($id);
            $call = new \Controller\AdViewReq();
            $call->get();
        }
        else
        {
            echo \View\Loader::make()->render("templates/not_admin.twig");
        }
    }
}

//Class to handle post requests for denial of checkout requests.
class DenyIssue extends AdViewReq{

    public function get() {
        parent::get();
    }

    public function post(){
        if (isset($_SESSION['username_ad']) && isset($_SESSION['password_ad'])) 
        {
            $id = $_POST["id"];
            \Model\AdminReq::denyIssue($id);
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
            \Model\AdminReq::approveReturn($id);
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
            \Model\AdminReq::denyReturn($id);
            $call = new \Controller\AdViewReq();
            $call->get();
        }
        else
        {
            echo \View\Loader::make()->render("templates/not_admin.twig");
        }
    }
}

