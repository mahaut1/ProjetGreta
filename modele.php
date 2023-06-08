<?php
  include_once "config.php";

    function getAnnonces() {
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

function getAnnoncesByCategorie($nomCategorie){
        try {
            $db=connect();
            $query=$db->prepare('SELECT * FROM annonces WHERE nom_categorie= :nom_categorie');
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function getAnnonceById($id_annonce){
        try {
            $db = connect();
            $query=$db->prepare('SELECT * FROM annonces where id_annonce= :id_annonce');
            $query->execute(['id_annonce'=>$id_annonce]);
            if ($query->rowCount()){
                return $query->fetch();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return false;
    }

    

    function resetPwd() { $token=htmlspecialchars($_POST['token']);
        $user=getUserByToken($token);
        if($user){
            if (time()<$user['perim']){
                if ($_POST['pwd']===$_POST['pwd2']){
                    if(preg_match("/^(?=.\d)(?=.[0-9])(?=.[a-z])(?=.[A-Z])(?=.*[\W]).{8,}$/", $_POST['pwd'])){                  $pwd=password_hash($_POST['pwd'], PASSWORD_DEFAULT);
                        try {
                            $db = connect();
                            $query=$db->prepare('UPDATE users SET token = NULL, password = :pwd, actif = 1 WHERE token= :token');
                            $query->execute(['pwd'=> $pwd, 'token'=> $token]);
                            if ($query->rowCount()){
                                $content="<p>Votre mot de passe a été réinitialisé</p>";
                                $headers = array(
                                    'MIME-Version' => '1.0',
                                    'Content-type' => 'text/html; charset=iso-8859-1',
                                    'X-Mailer' => 'PHP/' . phpversion()
                                );
                                mail($user['email'],"Réinitialisation de mot de passe", $content, $headers);
                                return array("success", "Votre mot de passe a bien été réinitialisé");
                            }else return array("error", "Problème lors de la réinitialisation");
                        } catch (Exception $e) {
                            return array("error",  $e->getMessage());
                        } 
                    }else return array("error", "Le mot de passe doit comporter au moins 8 caractères dont au moins 1 chiffre, 1 minuscule, 1 majuscule et 1 caractère spécial");
                }else return array("error", "Les 2 saisies de mot de passe doivent être identiques.");
            }else return array("error", "Le lien n'est plus valide ! Veuillez <a href='?p=forgot'>recommencer</a>");
        }else return array("error", "Les données ont été corrompues ! Veuillez <a href='?p=forgot'>recommencer</a>");
    }


    function waitReset() {// en cas oubli de mot de passe
        $email=filter_var(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL);
        if(getUserByEmail($email)){// S'il existe dans la base de donnée
            $token=bin2hex(random_bytes(16));// je crée un token
            $perim=time()+1200;// avec une date de péremption (20 minutes)
            try {
                $db = connect();
                $query=$db->prepare('UPDATE membres SET token = :token, perim = :perim WHERE email = :email');// J'update l'utilisateur avec le nvx token et la date de peremption
                $query->execute(['email'=> $email, 'perim'=> $perim , 'token'=> $token]);// j'execute avec l'email le perim et le token
                if ($query->rowCount()){
                    $content="<p><a href='authentification.test?p=reset&t=$token'>Merci de cliquer sur ce lien pour réinitialiser votre mot de passe</a></p>";// Je prépare le mail avec le token en paramètre d'url
                    // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
                    $headers = array(
                        'MIME-Version' => '1.0',
                        'Content-type' => 'text/html; charset=iso-8859-1',
                        'X-Mailer' => 'PHP/' . phpversion()
                    );
                    mail($email,"Réinitialisation de mot de passe", $content, $headers);
                    return array("success", "Vous allez recevoir un mail pour réinitialiser votre mot de passe".$content);
                }else array("error", "Problème lors du process de réinitialisation");
            } catch (Exception $e) {
                return array("error",  $e->getMessage());
            }
        }else array("error", "Aucun compte ne correspond à cet email.");// S'il n'a pas réussi a trouver d'utilisateur avec cet email
    }

function getUser(){
    try {
        $db = connect();
        $query=$db->prepare('SELECT * FROM membres');
        $query->execute(['email'=>$email]);
        if ($query->rowCount()){
            // Renvoie toutes les infos de l'utilisateur
            return $query->fetch(); // fetch pour une seule ligne
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return false;
}

    // Récupération d'un utilisateur à partir de son email
function getUserByEmail($email) {
    try {
        $db = connect();
        $query=$db->prepare('SELECT * FROM membres WHERE email= :email');
        $query->execute(['email'=>$email]);
        if ($query->rowCount()){
            // Renvoie toutes les infos de l'utilisateur
            return $query->fetch(); // fetch pour une seule ligne
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    } 
    return false;
} 

// Récupération d'un utilisateur à partir d'un token
function getUserByToken($token) {
    try {
        $db = connect();
        $query=$db->prepare('SELECT * FROM membres WHERE token= :token');
        $query->execute(['token'=>$token]);
        if ($query->rowCount()){
            // Renvoie toutes les infos de l'utilisateur
            return $query->fetch();
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    } 
    return false;
}   

// Récupération d'un utilisateur à partir d'un id
function getUserById($id_membre) {
    try {
        $db = connect();
        $query=$db->prepare('SELECT * FROM membres WHERE id_membre= :id_membre');
        $query->execute(['id_membre'=>$id_membre]);
        if ($query->rowCount()){
            // Renvoie toutes les infos de l'utilisateur
            return $query->fetch();
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    } 
    return false;
}

function getProductById($id_annonce) {
    try {
        $db = connect();
        $query=$db->prepare('SELECT * FROM annonces WHERE id_annonce= :id_annonce');
        $query->execute(['id_annonce'=>$id_annonce]);
        if ($query->rowCount()){
            // Renvoie toutes les infos de l'utilisateur
            return $query->fetch();
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    } 
    return false;
}



function addUser() {
    $email=filter_var(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL);//on filtre l'email, on sanitize et on validate
    if(!getUserByEmail($email)){ // si l'email n'est pas dans la base de donnée 
        if ($_POST['pwd']===$_POST['pwd2']){// si les 2 mots de passes sont identiques
            if(preg_match("/^(?=.*\d)(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,}$/", $_POST['pwd'])){ // Je vérifie que le mdp correspond a cette expression regulière(au moins une minuscule, au moins une majuscule, au moins un caractère spécial, au moins 8 caractères (le pt acolade de la fin avec 8))
                $pwd=password_hash($_POST['pwd'], PASSWORD_DEFAULT); // on hash le mot de passe
                $nom=htmlspecialchars($_POST['nom']);// je m'assure contre les injections dans le nom
                $token=bin2hex(random_bytes(16)); // je crée le token, bin2hex pour le passer en paramètre d'URL, je suis sur d'avoir qqch d'aléatoire
                try {
                    $db = connect();// je me connecte a la BDD
                    $query=$db->prepare('INSERT INTO membres (email, nom, password, token) VALUES (:email, :nom, :pwd, :token)');// j'enregistre dans la base de donnée dans le même ordre!! sinon ça ne marche pas
                    $query->execute(['email'=> $email, 'nom'=> $nom , 'pwd'=> $pwd, 'token'=> $token]);
                    if ($query->rowCount()){// je verifie que ça a ete fait dans la base de donnée
                        $content="<p><a href='http://localhost/authentification?p=activation&t=$token'>Merci de cliquer sur ce lien pour activer votre compte</a></p>";// Je prepare le mail d'authentification avec le token et le lien d'activation je met sur quel page je dois l'envoyer
                        // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
                        $headers = array( // on fait le header pour le lien html
                            'MIME-Version' => '1.0',
                            'Content-type' => 'text/html; charset=iso-8859-1',
                            'X-Mailer' => 'PHP/' . phpversion()
                        );
                        mail($email,"Veuillez activer votre compte", $content, $headers); // J'envoie mon mail
                        return array("success", "Inscription réussi. Vous allez recevoir un mail pour activer votre compte");// message de succès
                    }else array("error", "Problème lors de enregistrement");// message de problème
                } catch (Exception $e) {
                    return array("error",  $e->getMessage());
                } // Les différents messages d'erreurs permettent de voir où sont les problèmes
            }else array("error", "Le mot de passe doit comporter au moins 8 caractères dont au moins 1 chiffre, 1 minuscule, 1 majuscule et 1 caractère spécial");
        }else array("error", "Les 2 saisies de mot de passes doivent être identique.");
    }else array("error", "Un compte existe déjà pour cet email.");
}

function logUser() {
    $email=filter_var(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL);
    $user=getUserByEmail($email);
    if($user){
        if(password_verify($_POST['pwd'], $user['password'])){
            if($user['actif']){
                $_SESSION['is_login']=true;// si il est connecté
                $_SESSION['is_actif']=$user['actif'];// si il est actif
                $_SESSION['id']=$user['id'];
               return array("success", "Connexion réussie :)");               
            }else return array("error", "Veuillez activer votre compte");
        }else return array("error", "Mauvais identifiants");
    }else return array("error", "Mauvais identifiants");
}

function activUser() {
    $token=htmlspecialchars($_GET['t']);// je me protege des injections avec htmlspecialchars
    $user=getUserByToken($token);// je récupère l'utilisateur avec le token dans le paramètre d'URL
    if($user){
        if(!$user['actif']){// si l'utilisateur n'est pas encore actif
            try {
                $db = connect();// je me connecte a la BDD
                $query=$db->prepare('UPDATE users SET token = NULL, actif = 1 WHERE token= :token');// J'update le user
                    $query->execute(['token'=> $token]);// j'execute
                    if ($query->rowCount()){// je verifie que ça a ete fait
                         return array("success", "Votre compte est activé, vous pouvez vous connecter"); 
                    }else return array("error", "Problème lors de l'activation"); 
            } catch (Exception $e) {
                return array("error",  $e->getMessage());
            }              
        }else return array("error", "Ce compte est déjà actif");
    }else return array("error", "Lien invalide !");
}

function removeUser($id_membre) {
        $db=connect();
        $query=$db->prepare('DELETE * FROM membres WHERE id_membre= :id_membre');
        $query->execute(['id_membre'=>$id_membre]);     
   } 


function removeCategorie($id_categorie){
    $db=connect();
    $query=$db->prepare('DELETE * FROM categories WHERE id_categorie= :id_categorie');
    $query->execute(['id_categorie'=>$id_categorie]);
}

function removeAnnonce($id_annonce){
    $db=connect();
    $query=$db->prepare('DELETE * FROM annonces WHERE id_annonce= :id_annonce');
    $query->execute(['id_annonce'=>$id_annonce]);
}

function getCategories(){
   try {
        $connexion=connect();
    $query=$db->prepare('SELECT * FROM categories');
    return $query->fetchall(PDO::FETCH_ASSOC);
   } catch (Exception $e) {
    echo $e->getMessage();
   }


}

?>