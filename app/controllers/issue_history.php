<?php

namespace Controller;

session_start();

class Issue_history {

    public function get() {
        echo \View\Loader::make()->render("templates/issue_history.twig", array(
            "historys" => \Model\Post::get_all_prevs($_SESSION['username']),
        ));
    }

    public function post(){
        echo \View\Loader::make()->render("templates/issue_history.twig", array(
            "historys" => \Model\Post::get_all_prevs($_SESSION['username']),
        ));
    }

}

?>
