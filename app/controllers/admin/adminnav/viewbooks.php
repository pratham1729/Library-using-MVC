<?php 

namespace Controller;

class ViewBooks{
    public function get(){
        if($_SESSION["admin"]){
        $data=\Model\ClientBooks::getAllBooks();
        echo \View\Loader::make()->render("templates/AdminBooks.twig", array(
            "booklist" => $data,
        ));}
        else{
            echo \View\Loader::make()->render("templates/home.twig", array());
        }
    }
}

?>