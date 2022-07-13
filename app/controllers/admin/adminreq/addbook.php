<?php 

namespace Controller;

class AddBook{
    public function post(){
        $book_name=$_REQUEST["bookname"];
        $book_id=$_REQUEST["book-id"];
        \Model\AdminRequests::add($book_id,$book_name);
        $data=\Model\ClientBooks::getAllBooks();
        echo \View\Loader::make()->render("templates/AdminBooks.twig", array(
            "booklist" => $data,
        ));
    }
}

?>