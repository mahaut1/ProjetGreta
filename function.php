<?php
    function db() {
        $connexion = null;
        $host = 'localhost';
        $db_name = 'Projet_annonces';
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
            $abosQuery=$db->query('SELECT * FROM annonces');
    
            // Renvoie tous les lignes
            return $abosQuery->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            // En cas d'erreur afficher le message
            echo $e->getMessage();
        }
    }
?>