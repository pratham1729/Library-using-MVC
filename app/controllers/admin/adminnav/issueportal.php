<?php

namespace Controller;

class IssuePortal{
    public function get(){
        if($_SESSION["admin"]){
        $data=\Model\ClientBooks::getIssueRequest();
        echo \View\Loader::make()->render("templates/IssuePortal.twig", array(
            "issue" => $data,
        ));
        }
        else{
        echo \View\Loader::make()->render("templates/home.twig", array());
        }
    }
}

?>