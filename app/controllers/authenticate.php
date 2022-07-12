<?php

namespace Controller;

class Authenticate {
    public function post() {
        $type = $_POST["type"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $data=\Model\User::findUser($username);
        if($data){
            $check=password_verify($password.$data[3],$data[1]);
            if($check && $data[2]==0){
                $_SESSION["username"]=$username;
                $_SESSION["auth"]=true;
                $_SESSION["admin"]=false;
                echo \View\Loader::make()->render("templates/clienthome.twig", array(
                    "uname" => $username,
                    ));
            }
            else if($check && $data[2]==1){
                $_SESSION["username"]=$username;
                $_SESSION["auth"]=true;
                $_SESSION["admin"]=true;
                echo \View\Loader::make()->render("templates/adminhome.twig", array(
                    "uname" => $username,
                    ));
            }
            else if(!$check && $data[2]==0){
                echo \View\Loader::make()->render("templates/ClientLoginPage.twig", array(
                    "failed" => true,
                    "message" => "Incorrect password",
                    ));
            }
            else if(!$check && $data[2]==1){
                echo \View\Loader::make()->render("templates/AdminLoginPage.twig", array(
                    "failed" => true,
                    "message" => "Incorrect password",
                    ));
            }
            else{
                echo \View\Loader::make()->render("templates/home.twig", array());
            }
        }
        else{
            if($type=="client"){
                echo \View\Loader::make()->render("templates/ClientLoginPage.twig", array(
                    "failed" => true,
                    "message" => "User doesn't exist",
                    ));
            }
            else if($type=="admin"){
                echo \View\Loader::make()->render("templates/AdminLoginPage.twig", array(
                    "failed" => true,
                    "message" => "User doesn't exist",
                    ));
            }
        }
    }
}