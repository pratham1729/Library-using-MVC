<?php

namespace Controller;

class ReturnBook{
    public function post(){
        $username=$_REQUEST["username"];
        $book_name=$_REQUEST["book-name"];
        $book_id=$_REQUEST["book-id"];
        \Model\ClientRequests::makeRequest($book_id,$book_name,$username,"r");
        $data=\Model\ClientBooks::getIssued($_SESSION["username"]);
        echo \View\Loader::make()->render("templates/IssuedBooks.twig", array(
            "issued" => $data,
            "uname" => $_SESSION["username"],
        ));
    }
}

?>