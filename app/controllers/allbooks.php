<?php

namespace Controller;

session_start();

class Allbooks {
    public function get() {
        echo \View\Loader::make()->render("templates/allbooks.twig", array(
            "books" => \Model\Books::get_all_books(),
        ));
    }
    public function post() {
        echo \View\Loader::make()->render("templates/allbooks.twig", array(
            "books" => \Model\Books::get_all_books(),
        ));
    }

}