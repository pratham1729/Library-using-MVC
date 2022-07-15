<?php

namespace Controller;

class AdminRegisterRequest{
    public function get(){
        if($_SESSION["admin"]){
            $data=\Model\ClientBooks::getAdminRequest();
            echo \View\Loader::make()->render("templates/AdminRegisterRequest.twig", array(
                "adminreq" => $data,
            ));
        }
        else{
            echo \View\Loader::make()->render("templates/home.twig", array());
        }
    }
}

?>