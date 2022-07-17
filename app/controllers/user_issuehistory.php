<?php

namespace Controller;

isset($_SESSION) ? '':session_start();

class IssueHistory {

    public function get() {
        if (isset($_SESSION['username']) && isset($_SESSION['password'])) 
        {
            echo \View\Loader::make()->render("templates/issue_history.twig", array(
                "historys" => \Model\Post::getAllPrevs($_SESSION['username']),    
            ));
        }
        else
        {
            echo \View\Loader::make()->render("templates/not_admin.twig");
        }
    }
}

