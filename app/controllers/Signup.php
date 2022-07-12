<?php

namespace Controller;

class Register{
    public function post(){
        $username=$_POST["uname"];
        $password=$_POST["password"];
        $passwordC=$_POST["passwordC"];
        $type=$_POST["type"];
        $salt = bin2hex(random_bytes(4));
        $passwordhash=password_hash($password.$salt,PASSWORD_DEFAULT);
        if($type=="client"){
            $data=\Model\User::findUserClient($username);
            if(!$data){
                if($password==$passwordC){
                    \Model\User::addUser($username,$passwordhash,0,$salt);
                    echo \View\Loader::make()->render("templates/ClientLoginPage.twig", array());
                }else{
                    echo \View\Loader::make()->render("templates/ClientRegisterPage.twig", array(
                        "error" => true,
                        "msg" => "Passwords don't match",
                    ));
                }
            }
            else{
                echo \View\Loader::make()->render("templates/ClientRegisterPage.twig", array(
                    "error" => true,
                    "msg" => "Username is not Unique",
                ));
            }            
        }
        else if($type=="admin"){
            $data=\Model\User::findUserAdmin($username);
            if(!$data){
                if($password==$passwordC){
                    \Model\User::adminRequest($username,$passwordhash,$salt);
                    echo \View\Loader::make()->render("templates/AdminLoginPage.twig", array());
                }else{
                    echo \View\Loader::make()->render("templates/AdminRegisterPage.twig", array(
                        "error" => true,
                        "msg" => "Passwords don't match",
                    ));
                }
            }
            else{
                echo \View\Loader::make()->render("templates/AdminRegisterPage.twig", array(
                    "error" => true,
                    "msg" => "Username is not Unique",
                ));
            }            
        }
    }
}