<?php

class Etats{
protected $id_etats = [
        "Neuf" => 1,
        "Très bon état" => 2,
        "Bon état" => 3,
        "abimé" => 4
    ];
protected $id_etat;
protected $libelle_etat;
protected $description;

public function __construct($id_etat,$libelle_etat,$description){
    $this->id_etat=$id_etat;
    $this->libelle_etat=$libelle_etat;
    $this->description=$description;
}

public function setIdEtat($id_etat){
    $this->id_etat=$id_etat;
}

public function getIdEtat(){
    return $this->id_etat;
}

public function setLibelleEtat($libelle_etat){
    $this->libelle_etat=$libelle_etat;
}

public function getLibelleEtat(){
    return $this->libelle_etat;
}

public function setDescription($description){
    $this->description=$description;
}

public function getDescription(){
    return $this->description;
}


}