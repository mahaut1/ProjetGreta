<?php
class Annonce{
protected $date_creation;
protected $titre;
protected $description;
protected $prix_vente;
protected $id_etat;
protected $id_etats = [
    "Neuf" => 1,
    "Très bon état" => 2,
    "Bon état" => 3,
    "abimé" => 4
];
protected $auteur;
protected $file;
protected $filename;

public function __construct($date_creation, $titre,$description,$prix_vente,$id_etats,$auteur,$file,$filename){
    $this->date_creation=$date_creation;
    $this->titre=$titre;
    $this->description=$description;
    $this->prix_vente=$prix_vente;
    $this->id_etats=$id_etats;
    $this->auteur=$auteur;
    $this->file=$file;
    $this->filename=$filename;
}

public function setDateCreation($date_creation){
    $this->date_creation=$date_creation;
}

public function getDateCreation(){
    return $this->date_creation;
}

public function setTitre($titre){
    $this->titre=$titre;
}

/* public function getTitre(){
    return $this->titre
} */

public function setDescription($description){
    $this->description=$description;
}

/* public function getDescription(){
    return $this->description;
} */

public function setPrixVente($prix_vente){
    $this->prix_vente=$prix_vente;
}

public function getPrixVente(){
    return $this->prix_vente;
}

public function setIdEtat(){
    $this->id_etat=$id_etat;
}

public function getIdEtat(){
    return $this->id_etat;
}

public function setAuteur($auteur){
    $this->auteur=$auteur;
}

public function getAuteur(){
    return $this->auteur;
}

public function setFile($file){
    $this->file=$file;
}

function db() {
        $connexion = null;
        $host = 'localhost';
        $db_name = 'projet_annonces';
        $username = 'root';
        $password = '';
        try{
            $connexion = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
            $connexion->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $connexion;
    }

  function getAnnonce() {
        try {
            // Récupération de l'objet PDO
            $db = connect();
    
            // Requête pour récupérer toutes les annonces
            $annoncesQuery=$db->query('SELECT * FROM annonces');
    
            // Renvoie tous les lignes
            return $annoncesQuery->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            // En cas d'erreur afficher le message
            echo $e->getMessage();
        }
        }

function get_annonce_by_category($nomCategorie) {
    $connexion = db();
    $query = "SELECT * FROM annonces WHERE categorie=" . $id;
    $stmt = $connexion->prepare($query);
    $stmt->execute();		
    
    $annonces = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $products; 
}
function get_annonces_by_id($id_annonce) {
    $connexion = db();
    $query = "SELECT * FROM annonces WHERE id=" . $id;
    $stmt = $connexion->prepare($query);
    $stmt->execute();		
    
    $products = $stmt->fetch(PDO::FETCH_ASSOC);

    return $products; 
}

function get_annonces() {
    $connexion = db();
    $query = "SELECT * FROM annonces";
    $stmt = $connexion->prepare($query);
    $stmt->execute();		
    
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $products; 
}

function set_anonces() {
    $connexion = db();
    $query = "INSERT INTO annonces SET date_creation=:date_creation, titre=:titre, description=:description,  prix_vente=:prix_vente,  id_etat=:id_etat, id_utilisateur=:id_utilisateur, files=:files, filename=:filename";

    $stmt = $connexion->prepare($query);
    $stmt->bindParam(":date_creation", $data['date_creation']);
    $stmt->bindParam(":titre", $data['titre']);
    $stmt->bindParam(":description", $data['description']);
    $stmt->bindParam(":prix_vente", $data['prix_vente']);
    $stmt->bindParam(":id_etat", $data['id_etat']);
    $stmt->bindParam(":id_utilisateur", $data['id_utilisateur']);
    $filename = upload_file($files);
    $stmt->bindParam(":filename", $filename);
    
    $stmt->execute();
}
}