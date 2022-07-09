<?php

require __DIR__."/../vendor/autoload.php";

Toro::serve(array(
    "/" => "\Controller\Home",
    "/admin" => "\Controller\AdminLoginPage",
    "/client" => "\Controller\ClientLoginPage",
    "/authenticate" => "\Controller\Authenticate",
    "/ClientRegisterPage" => "\Controller\ClientRegisterPage",
    "/AdminRegisterPage" => "\Controller\AdminRegisterPage",
));
