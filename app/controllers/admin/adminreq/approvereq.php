<?php

namespace Controller;

class ApproveReq{
    public function post(){
        $password=$_REQUEST["password"];
        $username=$_REQUEST["username"];
        $salt=$_REQUEST["salt"];
        \Model\AdminRequests::approveAdmin($username,$password,$salt);
        $data=\Model\ClientBooks::getAdminRequest();
        echo \View\Loader::make()->render("templates/AdminRegisterRequest.twig", array(
            "adminreq" => $data,
        ));
    }
}

?>