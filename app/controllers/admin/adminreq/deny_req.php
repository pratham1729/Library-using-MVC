<?php

namespace Controller;

class DenyReq{
    public function post(){
        $password=$_REQUEST["password"];
        $username=$_REQUEST["username"];
        \Model\AdminRequests::denyAdmin($username);
        $data=\Model\ClientBooks::getAdminRequest();
        echo \View\Loader::make()->render("templates/AdminRegisterRequest.twig", array(
            "adminreq" => $data,
        ));
    }
}

?>