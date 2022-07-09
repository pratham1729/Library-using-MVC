<?php

namespace Controller;

class ClientLoginPage {
    public function get() {
        echo \View\Loader::make()->render("templates/ClientLoginPage.twig", array());
    }
}

class AdminLoginPage {
    public function get() {
        echo \View\Loader::make()->render("templates/AdminLoginPage.twig", array());
    }
}