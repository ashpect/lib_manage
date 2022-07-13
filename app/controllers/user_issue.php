<?php

namespace Controller;

isset($_SESSION) ? '':session_start();

class User_issue {
    public function get() {
        $call = new \Controller\Allbooks();
        $call->get();
    }
    public function post() {
        $bookid = $_POST["bookid"];
        $booknumber = $_POST["booknumber"];

        If($booknumber > 0 ){
            \Model\User_book::issue_book($bookid,$booknumber);
            $call = new \Controller\Allbooks();
            $call->get();
        }
        else{
            echo "The Requested Book Is Out Of Stock.Please choose any other book";
            echo \View\Loader::make()->render("templates/allbooks.twig", array(
                "books" => \Model\Books::get_all_books(),
            ));
        }

        
    }
}
