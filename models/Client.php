<?php

class Client {
private $idClient,$firstName,$lastName,$phone,$email, $password;
function __construct($firstName="",$lastName="",$phone="",$email="",$password="") {
	
    $this->firstName=$firstName;
    $this->lastName=$lastName;
    $this->phone=$phone;
    $this->email=$email;
    $this->password=$password;
}

function getIdClient(){
    return $this->idClient;
}

function setIdClient($idClient){
    $this->idClient=$idClient;
}


public function getFirstName(){
	return $this->firstName;
}

public function getLastName(){
	return $this->lastName;
}

public function getPhone(){
	return $this->phone;
}

public function getEmail(){
	return $this->email;
}
public function getPassword(){
	return $this->password;
}


public function setFirstName($name){
        $this->firstName = $name;
    }

public function setLastName($lastName){
        $this->lastName = $lastName;
    }

public function setPhone($phone){
        $this->phone = $phone;
    }

 public function setEmail($email){
        $this->email = $email	;
    }

public function setpassword($password){
        $this->password = $password	;
    }
	
}?>