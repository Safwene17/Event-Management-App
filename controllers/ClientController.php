<?php


require_once(__DIR__. '/../models/Client.php');
require_once(__DIR__. '/../database/config.php');


class ClientController extends Connexion{
function __construct() {
parent::__construct();
}

function insert(Client $c){

$query="insert into client(firstName,lastName,phone,email,password)values(?, ?, ?, ?, ?)";
$res=$this->pdo->prepare($query);

$aryy =array($c->getFirstName(),$c->getlastName(),$c->getPhone(),$c->getEmail() , $c->getPassword()) ;

return $res->execute($aryy);

}


function listeClient()
{
        $query = "select * from client";
        $res=$this->pdo->prepare($query);
        $res->execute();
        return $res;
}



public function getClient($clientId) {
    $stmt = $this->pdo->prepare("SELECT * FROM client WHERE idClient = ?");
    $stmt->execute([$clientId]);
    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($clientData) {
        $client = new Client();
        $client->setIdClient($clientData['idClient']);
        $client->setFirstName($clientData['firstName']);
        $client->setLastName($clientData['lastName']);
        $client->setPhone($clientData['phone']);
        $client->setEmail($clientData['email']);
        $client->setPassword($clientData['password']);
        
        return $client;
    } else {
        return null;
    }
}



function delete($idClient) 
{

    $query = "DELETE FROM client WHERE idClient=?";
    $res = $this->pdo->prepare($query);
    return $res->execute(array($idClient));
}




public function modifyClient(Client $c) {
    $sql = "UPDATE client SET firstName = ?, lastName = ?, phone = ?, email = ?, password = ? WHERE idClient = ?";
    $stmt = $this->pdo->prepare($sql);
    $result = $stmt->execute(array(
        $c->getFirstName(),
        $c->getLastName(),
        $c->getPhone(),
        $c->getEmail(),
        $c->getPassword(),
        $c->getIdClient()
    ));

    return $result;
}



function loginClient($email, $password) {
    $stmt = $this->pdo->prepare("SELECT * FROM client WHERE email = ? AND password = ?");
    $stmt->execute([$email, $password]);
    $client = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($client && $password) {
        // Login successful
        session_start();
        $_SESSION['idClient'] = $client['idClient'];
        $_SESSION['firstName'] = $client['firstName'];
        $_SESSION['lastName'] = $client['lastName'];
        $_SESSION['email'] = $client['email'];
        $_SESSION['password'] = $client['password'];
        $_SESSION['phone'] = $client['phone'];
        
        return true;
    } else {
        // Login failed
        return false;
    }
}

}







    

?>
