<?php 

namespace Controller;

class ClientRegisterPage{
    public function get() {
        echo \View\Loader::make()->render("templates/ClientRegisterPage.twig", array());
    }
}

class AdminRegisterPage{
    public function get(){
        echo \View\Loader::make()->render("templates/AdminRegisterPage.twig", array());
    }
}