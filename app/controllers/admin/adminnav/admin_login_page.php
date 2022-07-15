<?php

namespace Controller;

class AdminLoginPage {
    public function get() {
        echo \View\Loader::make()->render("templates/AdminLoginPage.twig", array());
    }
}

?>