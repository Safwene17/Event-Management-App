<?php

class Category {
    private $idCategory;
    private $nameCategory;
    private $description;
    private $image;

    function __construct($nameCategory= "", $description= "", $image= "") {
        $this->nameCategory = $nameCategory;
        $this->description = $description;
        $this->image = $image;
    }

    public function getIdCategory() {
        return $this->idCategory;
    }

    public function setIdCategory($idCategory) {
        $this->idCategory = $idCategory;
    }

    public function getCategoryName() {
        return $this->nameCategory;
    }

    public function setCategoryName($nameCategory) {
        $this->nameCategory = $nameCategory;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }
}
?>
