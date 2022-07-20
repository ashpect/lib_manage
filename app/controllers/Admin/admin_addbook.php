<?php

namespace Controller;

isset($_SESSION) ? '' : session_start();

//Class to handle get requests for accessing ADD/DELETE BOOKS PAGE by ADMIN.
class ViewAddBook
{
    public function get()
    {
        $call = \Controller\Authenticate::authAdmin();
        if (!$call) {
            return;
        }
        //Rendering Add/Delete Books Page and getting all books from db.
        echo \View\Loader::make()->render("templates/admin_addbook.twig", array(
            "books" => \Model\Books::getAllBooks(),
        ));
    }
}

//Class to handle get/post requests for ADDING BOOKS in db.
class AddBook extends ViewAddBook
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

        $title = $_POST["title"];
        $author = $_POST["author"];
        $numberofbooks = $_POST["numberofbooks"];

        \Model\AdminFunc::addbook($title, $author, $numberofbooks);

        echo \View\Loader::make()->render("templates/admin_addbook.twig", array(
            "books" => \Model\Books::getAllBooks(),
        ));
    }
}

//Class to handle get/post requests for DELETING BOOKS in db.
class DeleteBook extends ViewAddBook
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

        \Model\AdminFunc::deletebook($id);

        echo \View\Loader::make()->render("templates/admin_addbook.twig", array(
            "books" => \Model\Books::getAllBooks(),
        ));
    }
}
