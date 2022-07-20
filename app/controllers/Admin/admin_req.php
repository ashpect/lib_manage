<?php

namespace Controller;

isset($_SESSION) ? '' : session_start();

//Class to handle get requests for accessing REQUESTS APPROVAL PAGE by ADMIN.
class AdViewReq
{

    public function get()
    {
        $call = \Controller\Authenticate::authAdmin();
        if (!$call) {
            return;
        }

        echo \View\Loader::make()->render("templates/admin_viewreq.twig", array(
            "checkoutbooks" => \Model\AdminFunc::checkoutReq(),
            "checkinbooks" => \Model\AdminFunc::checkinReq(),
        ));
    }
}

//Class to handle post requests for approval of checkout requests.
class ApproveIssue extends AdViewReq
{

    public function get()
    {
        parent::get();
    }

    public function post()
    {
        $call = \Controller\Authenticate::authAdmin();
        if (!$call) {
            return;
        }

        $id = $_POST["id"];
        \Model\AdminReq::approveIssue($id);
        $call = new \Controller\AdViewReq();
        $call->get();
    }
}

//Class to handle post requests for denial of checkout requests.
class DenyIssue extends AdViewReq
{

    public function get()
    {
        parent::get();
    }

    public function post()
    {
        $call = \Controller\Authenticate::authAdmin();
        if (!$call) {
            return;
        }

        $id = $_POST["id"];
        \Model\AdminReq::denyIssue($id);
        $call = new \Controller\AdViewReq();
        $call->get();
    }
}

class ApproveReturn extends AdViewReq
{

    public function get()
    {
        parent::get();
    }

    public function post()
    {
        $call = \Controller\Authenticate::authAdmin();
        if (!$call) {
            return;
        }

        $id = $_POST["id"];
        \Model\AdminReq::approveReturn($id);

        //Updating Fine
        $checkin_time = $_POST["checkin_time"];
        $checkout_time = $_POST["checkout_time"];
        $differenceInTime = strtotime($checkin_time) - strtotime($checkout_time);
        $differenceInDays = round($differenceInTime / (60 * 60 * 24));

        if ($differenceInDays > 6) {
            $fine = $differenceInDays * 2;
            \Model\UserBook::updateFine($id, $fine);
        }

        $call = new \Controller\AdViewReq();
        $call->get();
    }
}

class DenyReturn extends AdViewReq
{

    public function get()
    {
        parent::get();
    }

    public function post()
    {
        $call = \Controller\Authenticate::authAdmin();
        if (!$call) {
            return;
        }

        $id = $_POST["id"];
        \Model\AdminReq::denyReturn($id);
        $call = new \Controller\AdViewReq();
        $call->get();
    }
}
