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

class IssuePortal{
    public function get(){
        if($_SESSION["admin"]){
        $data=\Model\ClientBooks::getIssueRequest();
        echo \View\Loader::make()->render("templates/IssuePortal.twig", array(
            "issue" => $data,
        ));
    }else{
        echo \View\Loader::make()->render("templates/home.twig", array());
    }
}
}

class ReturnPortal{
    public function get(){
        if($_SESSION["admin"]){
            $data=\Model\ClientBooks::getReturnRequest();
            echo \View\Loader::make()->render("templates/ReturnPortal.twig", array(
                "ret" => $data,
            ));
        }else{
            echo \View\Loader::make()->render("templates/home.twig", array());
        }
}
}

class AdminRegisterRequest{
    public function get(){
        if($_SESSION["admin"]){
            $data=\Model\ClientBooks::getAdminRequest();
            echo \View\Loader::make()->render("templates/AdminRegisterRequest.twig", array(
                "adminreq" => $data,
            ));
        }
        // else{
        //     echo \View\Loader::make()->render("templates/home.twig", array());
        // }
}
}
