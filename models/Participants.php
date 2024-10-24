<?php

class Participants {
private $idClient;
private $idEvent;
private $numParticipants ;


function __construct($idClient= "",$idEvent= "") {
	
    $this->idClient=$idClient;
    $this->idEvent=$idEvent;
    $this->numParticipants=0;

}
public function setParticipants($numParticipants){
    $this->numParticipants= $numParticipants;
}

public function getParticipants(){
    return $this->numParticipants;
}


public function getIdClient() {
    return $this->idClient;
}

public function setIdClient($idClient) {
    $this->idClient = $idClient;
}

public function getIdEvent() {
    return $this->idEvent;
}

public function setIdEvent($idEvent) {
    $this->idEvent = $idEvent;
}

}
?>