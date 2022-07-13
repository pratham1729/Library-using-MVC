<?php

namespace Controller;

class RequestedBooks{
    public function get(){
        if($_SESSION["auth"]){
        $data=\Model\ClientBooks::getRequested($_SESSION["username"]);
        echo \View\Loader::make()->render("templates/RequestedBooks.twig", array(
            "requested" => $data,
            "uname" => $_SESSION["username"],
        ));
        }
        else{
            echo \View\Loader::make()->render("templates/home.twig", array());
        }
    }
}

?>