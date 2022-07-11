<?php 

namespace Controller;

class AddBook{
    public function post(){
        $bname=$_REQUEST["bookname"];
        $bid=(int)$_REQUEST["bookid"];
        \Model\AdminRequests::add($bid,$bname);
        $data=\Model\ClientBooks::get_all_books();
        echo \View\Loader::make()->render("templates/AdminBooks.twig", array(
            "booklist" => $data,
        ));
    }
}

class RemoveBook{
    public function post(){
        $bid=(int)$_REQUEST["bookid"];
        \Model\AdminRequests::remove($bid);
        $data=\Model\ClientBooks::get_all_books();
        echo \View\Loader::make()->render("templates/AdminBooks.twig", array(
            "booklist" => $data,
        ));
    }
}

class IssueAccept{
    public function post(){
        $bid=(int)$_REQUEST["bookid"];
        $username=$_REQUEST["username"];
        \Model\AdminRequests::issue_accept($bid,$username);
        $data=\Model\ClientBooks::get_issuerequest();
        echo \View\Loader::make()->render("templates/IssuePortal.twig", array(
            "issue" => $data,
        ));
    }
}

class IssueDecline{
    public function post(){
        $bid=(int)$_REQUEST["bookid"];
        $username=$_REQUEST["username"];
        \Model\AdminRequests::issue_decline($bid,$username);
        $data=\Model\ClientBooks::get_issuerequest();
        echo \View\Loader::make()->render("templates/IssuePortal.twig", array(
            "issue" => $data,
        ));
    }
}

class ReturnAccept{
    public function post(){
        $bid=(int)$_REQUEST["bookid"];
        $username=$_REQUEST["username"];
        \Model\AdminRequests::return_accept($bid,$username);
        $data=\Model\ClientBooks::get_returnrequest();
        echo \View\Loader::make()->render("templates/ReturnPortal.twig", array(
            "ret" => $data,
        ));
    }
}

class ApproveReq{
    public function post(){
        $password=$_REQUEST["password"];
        $username=$_REQUEST["username"];
        \Model\AdminRequests::approve_admin($username,$password);
        $data=\Model\ClientBooks::get_adminrequest();
        echo \View\Loader::make()->render("templates/AdminRegisterRequest.twig", array(
            "adminreq" => $data,
        ));
    }
}

class DenyReq{
    public function post(){
        $password=$_REQUEST["password"];
        $username=$_REQUEST["username"];
        \Model\AdminRequests::deny_admin($username,$password);
        $data=\Model\ClientBooks::get_adminrequest();
        echo \View\Loader::make()->render("templates/AdminRegisterRequest.twig", array(
            "adminreq" => $data,
        ));
    }
}