<?php

namespace Controller;

class ClientHome{
    public function get(){
        echo \View\Loader::make()->render("templates/clienthome.twig", array(
            "uname" => $_SESSION["username"],
            ));
    }
}

class AdminHome{
    public function get(){
        echo \View\Loader::make()->render("templates/adminhome.twig", array(
            "uname" => $_SESSION["username"],
            ));
    }
}