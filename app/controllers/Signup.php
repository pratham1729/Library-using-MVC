<?php

namespace Controller;

class Register{
    public function post(){
        $username=$_POST["uname"];
        $password=$_POST["password"];
        $passwordC=$_POST["passwordC"];
        $type=$_POST["type"];
        $passwordhash=password_hash($password,PASSWORD_DEFAULT);
        if($type=="client"){
            $data=\Model\User::find_user_client($username);
            if(!$data){
                if($password==$passwordC){
                    \Model\User::add_user($username,$passwordhash,0);
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
            $data=\Model\User::find_user_admin($username);
            if(!$data){
                if($password==$passwordC){
                    \Model\User::admin_request($username,$passwordhash);
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