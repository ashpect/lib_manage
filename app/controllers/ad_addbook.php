<?php

namespace Controller;

isset($_SESSION) ? '':session_start();

//Class to handle get requests for accessing ADD/DELETe BOOKS PAGE by ADMIN.
class ViewAddBook {

    public function get() {
        //Checking for valid ADMIN session.
        if (isset($_SESSION['username_ad']) && isset($_SESSION['password_ad'])) 
        {
            //Rendering Add/Delete Books Page and getting all books from db.
            echo \View\Loader::make()->render("templates/ad_addbook.twig", array(
                "books" => \Model\Books::get_all_books(),
            ));
        }
        else
        {
            //Redirecting to not admin page under invalid request.
            echo \View\Loader::make()->render("templates/not_admin.twig");
        }
    }

}

//Class to handle get/post requests for ADDING BOOKS in db.
class AddBook extends ViewAddBook{
    
    public function get() {
        parent::get();
    }

    public function post(){
        //Checking for valid ADMIN session.
        if (isset($_SESSION['username_ad']) && isset($_SESSION['password_ad'])) 
        {
            $title = $_POST["title"];
            $author = $_POST["author"];
            $numberofbooks = $_POST["numberofbooks"];

            \Model\AdminFunc::addbook($title,$author,$numberofbooks);

            echo \View\Loader::make()->render("templates/ad_addbook.twig", array(
                "books" => \Model\Books::get_all_books(),
            ));

        }
        else
        {
            echo \View\Loader::make()->render("templates/not_admin.twig");
        }
    }
}

//Class to handle get/post requests for DELETING BOOKS in db.
class DeleteBook extends ViewAddBook{

    public function get() {
        parent::get();
    }

    public function post(){
        //Checking for valid ADMIN session.
        if (isset($_SESSION['username_ad']) && isset($_SESSION['password_ad'])) 
        {
            $id = $_POST["id"];

            \Model\AdminFunc::deletebook($id);

            echo \View\Loader::make()->render("templates/ad_addbook.twig", array(
                "books" => \Model\Books::get_all_books(),
            ));
        }
        else
        {
            echo \View\Loader::make()->render("templates/not_admin.twig");
        }
    }
}

