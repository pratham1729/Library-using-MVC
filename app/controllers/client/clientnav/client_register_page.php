<?php 

namespace Controller;

class ClientRegisterPage{
    public function get() {
        echo \View\Loader::make()->render("templates/ClientRegisterPage.twig", array());
    }
}

?>