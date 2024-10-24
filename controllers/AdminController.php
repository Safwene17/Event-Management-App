<?php

include_once(__DIR__ . '/../database/config.php');
include_once(__DIR__ . '/../models/Admin.php');


class AdminController extends Connexion{
function __construct() {
parent::__construct();
}


function liste()
{
        $query = "select * from admin";
        $res=$this->pdo->prepare($query);
        $res->execute();
        return $res;
}

function getAdmin($idAdmin){
        $query="SELECT * FROM admin WHERE idAdmin = ? ";
        $res = $this->pdo->prepare($query);
        $res->execute(array($idAdmin));
        $array= $res->fetch();
        return $array;
    }
    
    
    function deleteAdmin($idAdmin) 
    {
        $query = "delete from admin where idAdmin=?";
        $res=$this->pdo->prepare($query);
        return $res->execute(array($idAdmin));
    }
    
    
    
    function modifyAdmin(Admin $a)
    {
    $sql = "UPDATE `admin` SET `email`='?',`password`='?' WHERE idAdmin='?'";
    $stmt= $this->pdo->prepare($sql);
    $stmt->execute(array($a->getEmail(), $a->getPassword(), $a->getUsername()));
    }


    function login($email, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM admin WHERE email = ? AND password = ?");
        $stmt->execute([$email, $password]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($admin && $password) {
          
            session_start();
            $_SESSION['idAdmin'] = $admin['idAdmin'];
            $_SESSION['username'] = $admin['username'];
            $_SESSION['password'] = $admin['password'];
            return true;
        } else {
          
            return false;
        }
    }
    


}