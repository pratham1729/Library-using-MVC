<?php

namespace Controller;

class ClientLoginPage {
    public function get() {
        echo \View\Loader::make()->render("templates/ClientLoginPage.twig", array());
    }
}

?>