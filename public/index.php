<?php
session_start();
$_SESSION["auth"]=false;
require __DIR__."/../vendor/autoload.php";

Toro::serve(array(
    "/" => "\Controller\Home",
    "/admin" => "\Controller\AdminLoginPage",
    "/client" => "\Controller\ClientLoginPage",
    "/authenticate" => "\Controller\Authenticate",
    "/ClientRegisterPage" => "\Controller\ClientRegisterPage",
    "/AdminRegisterPage" => "\Controller\AdminRegisterPage",
    "/register" => "\Controller\Register",
    "/logout" => "\Controller\Logout",
    "/requestportal" => "\Controller\RequestPortal",
    "/issuedbooks" => "\Controller\IssuedBooks",
    "/requestedbooks" => "\Controller\RequestedBooks",
    "/clienthome" => "\Controller\ClientHome",
    "/adminhome" => "\Controller\AdminHome",

));
