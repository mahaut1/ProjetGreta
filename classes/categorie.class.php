<?php
class Categorie{
    protected $nom_categorie;
    protected $description;

public function __construct($nom_categorie,$description){
    $this->nom_categorie=$nom_categorie;
    $this->description=$description;
}

public function setNomCategorie($nom_categorie){
    $this->nom_categorie=$nom_categorie;
}

public function getNomCategorie(){
   return  $this->nom_categorie;
}

public function setDescription($description){
    $this->description=$description;
}

public function getDescription(){
    return $this->description;
}

function get_annonce_by_category($nomCategorie) {
    $connexion = db();
    $query = "SELECT * FROM annonces WHERE categorie=" . $id;
    $stmt = $connexion->prepare($query);
    $stmt->execute();		
    
    $annonces = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $products; 
}
}