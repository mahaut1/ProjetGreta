<?php
    include_once "config.php";

    function upload_file($file) {
        $uploadDir = __DIR__ . '/uploads/';
        $uploadFilename = $uploadDir . basename($file['file']['name']);
        
        move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilename);

        return basename($file['file']['name']);
    }
    function get_annonce_by_category($nomCategorie) {
        $connexion = db();
        $query = "SELECT * FROM annonces WHERE category=" . $id;
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
        $query = "INSERT INTO annonces SET date_creation=:date_creation, titre=:titre, description=:description, duree_de_publication=:duree_de_publication, prix_vente=:prix_vente, cout_annonce=:cout_annonce, date_validation=:date_validation, date_fin_publication=:date_fin_publication, id_etat=:id_etat, id_utilisateur=:id_utilisateur, date_vente:=date_vente, id_acheteur=:id_acheteur";

        $stmt = $connexion->prepare($query);
        $stmt->bindParam(":date_creation", $data['date_creation']);
        $stmt->bindParam(":titre", $data['titre']);
        $stmt->bindParam(":description", $data['description']);
        $stmt->bindParam(":duree_publication", $data['duree_publication']);
        $stmt->bindParam(":prix_vente", $data['prix_vente']);
        $stmt->bindParam(":cout_annonce", $data['cout_annonce']);
        $stmt->bindParam(":date_validation", $data['date_validation']);
        $stmt->bindParam(":date_fin_publication", $data['date_fin_publication']);
        $stmt->bindParam(":id_etat", $data['id_etat']);
        $stmt->bindParam(":id_utilisateur", $data['id_utilisateur']);
        $stmt->bindParam(":date_vente", $data['date_vente']);
        $stmt->bindParam(":id_acheteur", $data['duree_publication']);
        

        $filename = upload_file($files);
        $stmt->bindParam(":filename", $filename);
        
        $stmt->execute();
    }
    function get_categories() {
        $connexion = db();
        $query = "SELECT * FROM categories";
	    $stmt = $connexion->prepare($query);
	    $stmt->execute();		
        
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

	    return $categories; 
    }
    function set_category($data) {
        $connexion = db();
        $query = "INSERT INTO categorie SET nom_categorie=:nom_categorie, description=:description";   
        $stmt = $connexion->prepare($query);
        $stmt->bindParam(":nom_categorie", $data['nom_categorie']);
        $stmt->execute();
    }
    function remove_category($id) {
        $connexion = db();
        $query = "DELETE FROM category WHERE id=" . $id;

        $stmt = $connexion->prepare($query);
        $stmt->execute();
    }
    function remove_product($id) {
        $connexion = db();
        $query = "DELETE FROM product WHERE id=" . $id;

        $stmt = $connexion->prepare($query);
        $stmt->execute();
    }
    function get_users($isAdmin = 0) {
        $connexion = db();
        $query = "SELECT * FROM user WHERE admin=" . $isAdmin;
	    $stmt = $connexion->prepare($query);
	    $stmt->execute();		
        
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
	    return $users; 
    }
    function set_user($data) {
        $connexion = db();
        $query = "INSERT INTO membres SET is_admin=:is_admin, username=:username, email=:email, hash=:hash, nom=:nom, prenom=:prenom, date_naissance=:date_naissance, num_telephone=:num_telephone, adresse_postale=:adresse_postale, code_postal=:code_postal, ville=:ville, date_inscription=:date_inscription, token=:token, date_validité_token=:date_validité_token, solde_cagnotte=:solde_cagnotte";


        $stmt = $connexion->prepare($query);
        $isAdmin = $data['is_admin'];
        $password = md5($data['password']);
        $admin = (isset($data['admin'])) ? 1 : 0;
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":hash", $hash);
        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":prenom", $prenom);
        $stmt->bindParam(":date_naissance", $dateNaissance);
        $stmt->bindParam(":num_telephone", $numTel);
        $stmt->bindParam(":adresse_postale", $adressePostale);
        $stmt->bindParam(":code_postal", $codePostal);
        $stmt->bindParam(":ville", $ville);
        $stmt->bindParam(":date_inscription", $dateInscription);
        $stmt->bindParam(":token", $token);
        $stmt->bindParam(":date_validite_token", $dateValiditéToken);
        $stmt->bindParam(":solde_cagnotte", $soldeCagnotte);
        $stmt->execute();
    }
    function remove_user($id) {
        $connexion = db();
        $query = "DELETE FROM membres WHERE id=" . $id;

        $stmt = $connexion->prepare($query);
        $stmt->execute();
    }
    function find_user_by_email_and_password($data){
        $connexion = db();
        $query = "SELECT * FROM membres WHERE email='" . $data['email'] ."'";
	    $stmt = $connexion->prepare($query);
	    $stmt->execute();		
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($user) && ($user['password'] == md5($data['password']))) {
            return $user;
        } else {
            return null;
        }
    }
?>