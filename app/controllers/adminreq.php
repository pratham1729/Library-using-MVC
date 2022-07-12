<?php 

namespace Controller;

class AddBook{
    public function post(){
        $bname=$_REQUEST["bookname"];
        $bid=$_REQUEST["bookid"];
        \Model\AdminRequests::add($bid,$bname);
        $data=\Model\ClientBooks::getAllBooks();
        echo \View\Loader::make()->render("templates/AdminBooks.twig", array(
            "booklist" => $data,
        ));
    }
}

class RemoveBook{
    public function post(){
        $bid=$_REQUEST["bookid"];
        \Model\AdminRequests::remove($bid);
        $data=\Model\ClientBooks::getAllBooks();
        echo \View\Loader::make()->render("templates/AdminBooks.twig", array(
            "booklist" => $data,
        ));
    }
}

class IssueAccept{
    public function post(){
        $bid=$_REQUEST["bookid"];
        $username=$_REQUEST["username"];
        \Model\AdminRequests::issueAccept($bid,$username);
        $data=\Model\ClientBooks::getIssueRequest();
        echo \View\Loader::make()->render("templates/IssuePortal.twig", array(
            "issue" => $data,
        ));
    }
}

class IssueDecline{
    public function post(){
        $bid=$_REQUEST["bookid"];
        $username=$_REQUEST["username"];
        \Model\AdminRequests::issueDecline($bid,$username);
        $data=\Model\ClientBooks::getIssueRequest();
        echo \View\Loader::make()->render("templates/IssuePortal.twig", array(
            "issue" => $data,
        ));
    }
}

class ReturnAccept{
    public function post(){
        $bid=$_REQUEST["bookid"];
        $username=$_REQUEST["username"];
        \Model\AdminRequests::returnAccept($bid,$username);
        $data=\Model\ClientBooks::getReturnRequest();
        echo \View\Loader::make()->render("templates/ReturnPortal.twig", array(
            "ret" => $data,
        ));
    }
}

class ApproveReq{
    public function post(){
        $password=$_REQUEST["password"];
        $username=$_REQUEST["username"];
        $salt=$_REQUEST["salt"];
        \Model\AdminRequests::approveAdmin($username,$password,$salt);
        $data=\Model\ClientBooks::getAdminRequest();
        echo \View\Loader::make()->render("templates/AdminRegisterRequest.twig", array(
            "adminreq" => $data,
        ));
    }
}

class DenyReq{
    public function post(){
        $password=$_REQUEST["password"];
        $username=$_REQUEST["username"];
        \Model\AdminRequests::denyAdmin($username,$password);
        $data=\Model\ClientBooks::getAdminRequest();
        echo \View\Loader::make()->render("templates/AdminRegisterRequest.twig", array(
            "adminreq" => $data,
        ));
    }
}