<?php

require_once 'functions.php';

if (!empty($_POST)) {
    // Récupération des champs du formulaire
    $nomCategorie = $_POST['nom_categorie'] ?? '';
    $description=$_POST['description'] ?? '';

    // Création de l'objet BDD
    $db = connect();

    // Si une catégorie a un ID, elle est déjà enregistré en BDD, donc on la met à jour, sinon on la crée.
    if (empty($_POST['id_categorie'])) {
        // La catégorie n'est pas dans la BDD, on le crée
        try {
            // Préparation de la requête d'insertion
            $createCatStmt = $db->prepare('INSERT INTO categorie (nom_categorie, description ) VALUES (:nom_categorie, :description)');
            // Exécution de la requête
            $createCatStmt->execute(['nom_categorie'=>$nomCategorie, 'description'=>$description]);
            // Vérification qu'une ligne a bien été impactée avec rowCount(). Si oui, on estime que la requête a bien été passée, sinon, elle a sûrement échoué.
            if ($createCatStmt->rowCount()) {
                // Une ligne a été insérée => message de succès
                $type = 'success';
                $message = 'Catégorie ajouté';
            } else {
                // Aucune ligne n'a été insérée => message d'erreur
                $type = 'error';
                $message = 'Catégorie non ajouté';
            }
        } catch (Exception $e) {
            // Une exception a été lancée, récupération du message de l'exception
            $type = 'error';
            $message = 'Exception message: ' . $e->getMessage();
        }
    } else {
         // La catégorie existe en BDD, on le met à jour
        // Récupération de l'ID de la categorie
        $id = filter_input(INPUT_POST, 'id_categorie', FILTER_SANITIZE_NUMBER_INT);

        try {
            // Préparation de la requête de mis à jour
            $updateCatStmt = $db->prepare('UPDATE categories SET nom_categorie=:nom_categorie, description=:description WHERE id=:id');
            // Exécution de la requête
           $updateCatStmt->execute(['nom_categorie'=>$nomCategorie, 'description'=>$description, 'id_categorie'=>$idCategorie]);
            // Vérification qu'une ligne a bien été impactée avec rowCount(). Si oui, on estime que la requête a bien été passée, sinon, elle a sûrement échoué.
            if ($updateCatStmt->rowCount()) {
                // Une ligne a été mise à jour => message de succès
                $type = 'success';
                $message = 'Catégorie mis à jour';
            } else {
                // Aucune ligne n'a été mise à jour => message d'erreur
                $type = 'error';
                $message = 'Catégorie non mis à jour';
            }
        } catch (Exception $e) {
            // Une exception a été lancée, récupération du message de l'exception
            $type = 'error';
            $message = 'Catégorie non mis à jour: ' . $e->getMessage();
        }
    }
    // Fermeture des connexions à la BDD
    $createCatStmt = null;
    $updateCatStmt = null;
    $db = null;

    // Redirection vers la page principale des abos en passant le message et son type en variables GET
    header('location:' . 'cat.php?type=' . $type . '&message=' . $message);
}