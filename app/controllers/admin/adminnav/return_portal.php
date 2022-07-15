<?php

namespace Controller;

class ReturnPortal{
    public function get(){
        if($_SESSION["admin"]){
            $data=\Model\ClientBooks::getReturnRequest();
            echo \View\Loader::make()->render("templates/ReturnPortal.twig", array(
                "ret" => $data,
            ));
        }
        else{
            echo \View\Loader::make()->render("templates/home.twig", array());
        }
    }
}

?>