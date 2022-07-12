<?php 

namespace Controller;

class RequestPortal{
    public function get(){
        if($_SESSION["auth"]){
        $data=\Model\ClientBooks::getAllBooks();
        echo \View\Loader::make()->render("templates/ClientRequestPortal.twig", array(
            "booklist" => $data,
            "uname" => $_SESSION["username"]
        ));
    }else{
        echo \View\Loader::make()->render("templates/home.twig", array());
    }
}
}
class IssuedBooks{
    public function get(){
        if($_SESSION["auth"]){

        $data=\Model\ClientBooks::getIssued($_SESSION["username"]);
        echo \View\Loader::make()->render("templates/IssuedBooks.twig", array(
            "issued" => $data,
            "uname" => $_SESSION["username"],
        ));
    }else{
        echo \View\Loader::make()->render("templates/home.twig", array());
    }
}
}
class RequestedBooks{
    public function get(){
        if($_SESSION["auth"]){
        $data=\Model\ClientBooks::getRequested($_SESSION["username"]);
        echo \View\Loader::make()->render("templates/RequestedBooks.twig", array(
            "requested" => $data,
            "uname" => $_SESSION["username"],
        ));
    }else{
        echo \View\Loader::make()->render("templates/home.twig", array());
    }
}
}
