<?php

namespace Controller;

class Logout {
    public function GET(){
        session_destroy();
        header("location: /");
    }
}