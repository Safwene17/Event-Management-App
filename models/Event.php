<?php

class Event {
    private $idEvent, $idClient, $idCategory, $title, $description, $date, $duration, $localisation, $valid=0, $capacity, $image;

    function __construct($title="", $description="", $date=null, $localisation="", $capacity=0, $duration=0, $image="") {
        $this->title = $title;
        $this->description = $description;
        $this->date = $date ?? new DateTime();
        $this->localisation = $localisation;
        $this->valid ;
        $this->capacity = $capacity;
        $this->duration = $duration;
        $this->image = $image;
    }

    function getIdEvent() {
        return $this->idEvent;
    }

    function setIdEvent($idEvent){
        $this->idEvent = $idEvent;
    }

    function getTitle() {
        return $this->title;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function getDescription() {
        return $this->description;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function getDate() {
        return $this->date;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function getDuration() {
        return $this->duration;
    }

    function setDuration($duration) {
        $this->duration = $duration;
    }

    function getLocalisation() {
        return $this->localisation;
    }

    function setLocalisation($localisation) {
        $this->localisation = $localisation;
    }

    function getValid() {
        return $this->valid;
    }

    function setValid($valid) {
        $this->valid = 0;
    }

    function getCapacity() {
        return $this->capacity;
    }

    function setCapacity($capacity) {
        $this->capacity = $capacity;
    }

    function getIdCategory() {
        return $this->idCategory;
    }

    function setIdCategory($idCategory) {
        $this->idCategory = $idCategory;
    }

    function getIdClient() {
        return $this->idClient;
    }

    function setIdClient($idClient) {
        $this->idClient = $idClient;
    }

    function getImage() {
        return $this->image;
    }

    function setImage($image) {
        $this->image = $image;
    }
}
?>
