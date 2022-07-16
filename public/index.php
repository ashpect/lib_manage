<?php

require __DIR__."/../vendor/autoload.php";

Toro::serve(array(
    "/" => "\Controller\Home",
    "/logout" => "\Controller\Logout",
    "/post/:number" => "\Controller\Post",
    "/login" => "\Controller\Login",
    "/register" => "RegisterController",
	"/home" => "\Controller\Home",
    "/user_return" => "\Controller\UserReturn",
    "/issue_history" => "\Controller\IssueHistory",
    "/allbooks" => "\Controller\AllBooks",
    "/user_issue" => "\Controller\UserIssue",
    "/signup" => "\Controller\SignUp",

    "/admin_home" => "\Controller\AdHome",
    "/admin_viewreq" => "\Controller\AdViewReq",
    "/approve_issue" => "\Controller\ApproveIssue",
    "/deny_issue" => "\Controller\DenyIssue",
    "/approve_return" => "\Controller\ApproveReturn",
    "/deny_return" => "\Controller\DenyReturn",
    "/view_addbook" => "\Controller\\ViewAddBook",
    "/add_book" => "\Controller\AddBook",
    "/delete_book" => "\Controller\DeleteBook"
));


