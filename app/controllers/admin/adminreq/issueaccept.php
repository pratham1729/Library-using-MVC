<?php

namespace Controller;

class IssueAccept{
    public function post(){
        $book_id=$_REQUEST["book-id"];
        $username=$_REQUEST["username"];
        \Model\AdminRequests::issueAccept($book_id,$username);
        $data=\Model\ClientBooks::getIssueRequest();
        echo \View\Loader::make()->render("templates/IssuePortal.twig", array(
            "issue" => $data,
        ));
    }
}

?>