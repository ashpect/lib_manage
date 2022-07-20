<?php

namespace Controller;

isset($_SESSION) ? '' : session_start();

class IssueHistory
{

    public function get()
    {
        //Checking for valid ADMIN session
        $call = \Controller\Authenticate::authUser();
        if (!$call) {
            return;
        }

        echo \View\Loader::make()->render("templates/issue_history.twig", array(
            "historys" => \Model\Post::getAllPrevs($_SESSION['username']),
        ));
    }
}
