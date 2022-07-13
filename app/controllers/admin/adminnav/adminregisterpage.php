<?php

namespace Controller;

class AdminRegisterPage{
    public function get(){
        echo \View\Loader::make()->render("templates/AdminRegisterPage.twig", array());
    }
}

?>