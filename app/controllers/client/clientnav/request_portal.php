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
        }
        else{
            echo \View\Loader::make()->render("templates/home.twig", array());
        }
    }
}

?>