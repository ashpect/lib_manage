<?php

namespace Controller;

isset($_SESSION) ? '':session_start();

class UserIssue {

    public function get() {
        if (isset($_SESSION['username']) && isset($_SESSION['password'])) 
        {
            $call = new \Controller\AllBooks();
            $call->get();
        }
        else
        {
            echo \View\Loader::make()->render("templates/not_admin.twig");
        }
    }

    public function post() {
        if (isset($_SESSION['username']) && isset($_SESSION['password'])) 
        {
            $bookid = $_POST["bookid"];
            $booknumber = $_POST["booknumber"];

            If($booknumber > 0 ){
                \Model\UserBook::issueBook($bookid,$booknumber);
                $call = new \Controller\AllBooks();
                $call->get();
            }
            else{
                echo "The Requested Book Is Out Of Stock.Please choose any other book";
                echo \View\Loader::make()->render("templates/allbooks.twig", array(
                    "books" => \Model\Books::getAllBooks(),
                ));
            }
        }
        else
        {
            echo \View\Loader::make()->render("templates/not_admin.twig");
        }
    }
}
