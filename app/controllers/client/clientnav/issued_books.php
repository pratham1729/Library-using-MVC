<?php 

namespace Controller;

class IssuedBooks{
    public function get(){
        if($_SESSION["auth"]){

        $data=\Model\ClientBooks::getIssued($_SESSION["username"]);
        echo \View\Loader::make()->render("templates/IssuedBooks.twig", array(
            "issued" => $data,
            "uname" => $_SESSION["username"],
        ));
        }
        else{
            echo \View\Loader::make()->render("templates/home.twig", array());
        }
    }
}

?>