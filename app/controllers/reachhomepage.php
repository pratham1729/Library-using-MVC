<?php

namespace Controller;

class ClientHome{
    public function get(){
        if($_SESSION["auth"]){
        echo \View\Loader::make()->render("templates/clienthome.twig", array(
            "uname" => $_SESSION["username"],
            ));
        }else{
            echo \View\Loader::make()->render("templates/home.twig", array());
        }
}
}

class AdminHome{
    public function get(){
        if($_SESSION["admin"]){
        echo \View\Loader::make()->render("templates/adminhome.twig", array(
            "uname" => $_SESSION["username"],
            ));
    }else{
        echo \View\Loader::make()->render("templates/home.twig", array());
    }
}
}