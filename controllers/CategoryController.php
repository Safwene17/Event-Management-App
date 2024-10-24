<?php
include_once(__DIR__ .'/../models/Category.php') ;
include_once(__DIR__ .'/../database/config.php');

class CategoryController extends Connexion{
function __construct() {
parent::__construct();
}


public function insert(Category $c) {
    $query = "INSERT INTO category (nameCategory, description, image) VALUES (?, ?, ?)";
    $stmt = $this->pdo->prepare($query);
    $result = $stmt->execute([
        $c->getCategoryName(),
        $c->getDescription(),
        $c->getImage()
    ]);

    return $result;
}


function listeCategory()
{
        $query = "select * from category";
        $res=$this->pdo->prepare($query);
        $res->execute();
        return $res;
}

public function getCategoryById($categoryId) {//----------get category name---------------
    $query = "SELECT nameCategory FROM category WHERE idCategory = ?";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([$categoryId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}




public function getCategory($id) {
    $query = "SELECT * FROM category WHERE idCategory = ?";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
    
    
    function deleteCategory($id) 
    {
        $query = "delete from category where idCategory=?";
        $res=$this->pdo->prepare($query);
        return $res->execute(array($id));
    }
    
    
    
    public function modifyCategory(Category $category) {
        // Check if an image was uploaded
        $imageUpdate = "";
        $params = [$category->getCategoryName(), $category->getDescription()];
        if ($category->getImage()) {
            $imageUpdate = ", image = ?";
            $params[] = $category->getImage(); // Add image parameter
        }
        
        // Add idCategory parameter
        $params[] = $category->getIdCategory();
    
        $sql = "UPDATE category SET nameCategory = ?, description = ?" . $imageUpdate . " WHERE idCategory = ?";
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute($params);
    
        return $result;
    }
    
    


}