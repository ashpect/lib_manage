<?php

namespace Controller;

isset($_SESSION) ? '' : session_start();

class UserIssue
{

    public function get()
    {
        //Checking for valid ADMIN session
        $call = \Controller\Authenticate::authUser();
        if (!$call) {
            return;
        }
        $call = new \Controller\AllBooks();
        $call->get();
    }

    public function post()
    {
        //Checking for valid ADMIN session
        $call = \Controller\Authenticate::authUser();
        if (!$call) {
            return;
        }

        $bookid = $_POST["bookid"];
        $booknumber = $_POST["booknumber"];

        if ($booknumber > 0) {
            \Model\UserBook::issueBook($bookid, $booknumber);
            $call = new \Controller\AllBooks();
            $call->get();
        } else {
            echo "The Requested Book Is Out Of Stock.Please choose any other book";
            echo \View\Loader::make()->render("templates/allbooks.twig", array(
                "books" => \Model\Books::getAllBooks(),
            ));
        }
    }
}
