<?php

namespace Controller;

class RemoveBook{
    public function post(){
        $book_id=$_REQUEST["book-id"];
        \Model\AdminRequests::remove($book_id);
        $data=\Model\ClientBooks::getAllBooks();
        echo \View\Loader::make()->render("templates/AdminBooks.twig", array(
            "booklist" => $data,
        ));
    }
}

?>