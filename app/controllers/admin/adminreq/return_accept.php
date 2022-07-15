<?php

namespace Controller;

class ReturnAccept{
    public function post(){
        $book_id=$_REQUEST["book-id"];
        $username=$_REQUEST["username"];
        \Model\AdminRequests::returnAccept($book_id,$username);
        $data=\Model\ClientBooks::getReturnRequest();
        echo \View\Loader::make()->render("templates/ReturnPortal.twig", array(
            "ret" => $data,
        ));
    }
}

?>