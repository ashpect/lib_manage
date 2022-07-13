<?php

require __DIR__."/../vendor/autoload.php";

Toro::serve(array(
    "/" => "\Controller\Home",
    "/logout" => "\Controller\Logout",
    "/post/:number" => "\Controller\Post",
    "/login" => "\Controller\Login",
    "/register" => "RegisterController",
    "/admin" => "\Controller\admin",
	"/home" => "\Controller\Home",
    "/user_return" => "\Controller\User_return",
    "/issue_history" => "\Controller\Issue_history",
    "/allbooks" => "\Controller\Allbooks",
    "/user_issue" => "\Controller\User_issue",
    "/signup" => "\Controller\sign_up",

    "/ad_home" => "\Controller\ad_Home",
    "/ad_viewreq" => "\Controller\ad_viewreq",
    "/approve_issue" => "\Controller\approve_issue",
    "/deny_issue" => "\Controller\deny_issue",
    "/approve_return" => "\Controller\approve_return",
    "/deny_return" => "\Controller\deny_return",
    "/view_addbook" => "\Controller\s_addbook",
    "/add_book" => "\Controller\add_book",
    "/delete_book" => "\Controller\delete_book"
));


