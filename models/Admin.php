<?php

class Admin {
    private $idAdmin;
    private $email;
    private $password;

    private $username;

    function __construct($email= "",$password= "",$username="") {
	
        $this->email=$email;
        $this->password=$password;
        $this->username=$username;
    }


function setEmail($email) {
    $this->email=$email;
}
function setPassword($password) {
    $this->password=$password;
}
function getEmail() {
    return $this->email;
}
function getPassword() {
    return $this->password;
}

function getUsername() {
    return $this->username;
}

function setUsername($username){
    $this->username=$username;
}



}



?>