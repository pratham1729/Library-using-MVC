<?php 

namespace Controller;

class MakeRequest{
    public function post(){
        $username=$_REQUEST["username"];
        $bname=$_REQUEST["bookname"];
        $bid=(int)$_REQUEST["bookid"];
        \Model\ClientRequests::make_request($bid,$bname,$username,"i");
        $data=\Model\ClientBooks::get_all_books();
        echo \View\Loader::make()->render("templates/ClientRequestPortal.twig", array(
            "booklist" => $data,
            "uname" => $_SESSION["username"]
        ));
    }
}

class ReturnBook{
    public function post(){
        $username=$_REQUEST["username"];
        $bname=$_REQUEST["bookname"];
        $bid=(int)$_REQUEST["bookid"];
        \Model\ClientRequests::make_request($bid,$bname,$username,"r");
        $data=\Model\ClientBooks::get_issued($_SESSION["username"]);
        echo \View\Loader::make()->render("templates/IssuedBooks.twig", array(
            "issued" => $data,
            "uname" => $_SESSION["username"],
        ));
    }
}

class Cancel{
    public function post(){
        $username=$_REQUEST["username"];
        $bname=$_REQUEST["bookname"];
        $bid=(int)$_REQUEST["bookid"];
        \Model\ClientRequests::delete_request($bid,$username);
        $data=\Model\ClientBooks::get_issued($_SESSION["username"]);
        echo \View\Loader::make()->render("templates/RequestedBooks.twig", array(
            "requested" => $data,
            "uname" => $_SESSION["username"],
        ));
    }
}