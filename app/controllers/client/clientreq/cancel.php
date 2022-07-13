<?php

namespace Controller;

class Cancel{
    public function post(){
        $username=$_REQUEST["username"];
        $book_name=$_REQUEST["book-name"];
        $book_id=$_REQUEST["book-id"];
        \Model\ClientRequests::deleteRequest($book_id,$username);
        $data=\Model\ClientBooks::getRequested($_SESSION["username"]);
        echo \View\Loader::make()->render("templates/RequestedBooks.twig", array(
            "requested" => $data,
            "uname" => $_SESSION["username"],
        ));
    }
}

?>