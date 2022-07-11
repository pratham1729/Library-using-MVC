<?php 

namespace Controller;

class ViewBooks{
    public function get(){
        if($_SESSION["admin"]){
        $data=\Model\ClientBooks::get_all_books();
        echo \View\Loader::make()->render("templates/AdminBooks.twig", array(
            "booklist" => $data,
        ));
    }
    }
}

class IssuePortal{
    public function get(){
        if($_SESSION["admin"]){
        $data=\Model\ClientBooks::get_issuerequest();
        echo \View\Loader::make()->render("templates/IssuePortal.twig", array(
            "issue" => $data,
        ));
    }}
}

class ReturnPortal{
    public function get(){
        if($_SESSION["admin"]){
            $data=\Model\ClientBooks::get_returnrequest();
            echo \View\Loader::make()->render("templates/ReturnPortal.twig", array(
                "ret" => $data,
            ));
    }}
}

class AdminRegisterRequest{
    public function get(){
        if($_SESSION["admin"]){
            $data=\Model\ClientBooks::get_adminrequest();
            echo \View\Loader::make()->render("templates/AdminRegisterRequest.twig", array(
                "adminreq" => $data,
            ));
    }}
}
