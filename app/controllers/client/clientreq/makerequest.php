<?php 

namespace Controller;

class MakeRequest{
    public function post(){
        $username=$_REQUEST["username"];
        $book_name=$_REQUEST["book-name"];
        $book_id=$_REQUEST["book-id"];
        \Model\ClientRequests::makeRequest($book_id,$book_name,$username,"i");
        $data=\Model\ClientBooks::getAllBooks();
        echo \View\Loader::make()->render("templates/ClientRequestPortal.twig", array(
            "booklist" => $data,
            "uname" => $_SESSION["username"]
        ));
    }
}

?>