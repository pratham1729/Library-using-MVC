<?php 

namespace Controller;

class RequestPortal{
    public function get(){
        $data=\Model\ClientBooks::get_all_books();
        echo \View\Loader::make()->render("templates/ClientRequestPortal.twig", array(
            "booklist" => $data,
            "uname" => $_SESSION["username"]
        ));
    }}

class IssuedBooks{
    public function get(){
        $data=\Model\ClientBooks::get_issued($_SESSION["username"]);
        echo \View\Loader::make()->render("templates/IssuedBooks.twig", array(
            "issued" => $data,
            "uname" => $_SESSION["username"],
        ));
    }}

class RequestedBooks{
    public function get(){
        $data=\Model\ClientBooks::get_issued($_SESSION["username"]);
        echo \View\Loader::make()->render("templates/RequestedBooks.twig", array(
            "requested" => $data,
            "uname" => $_SESSION["username"],
        ));
    }}
