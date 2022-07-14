<?php

namespace Controller;

isset($_SESSION) ? '':session_start();

class AllBooks {
    public function get() {
        echo \View\Loader::make()->render("templates/allbooks.twig", array(
            "books" => \Model\Books::getAllBooks(),
        ));
    }
    public function post() {
        echo \View\Loader::make()->render("templates/allbooks.twig", array(
            "books" => \Model\Books::getAllBooks(),
        ));
    }

}