<?php


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

 ?>

<a href='index.php' class='btn btn-secondary m-2 active' role='button'>Accueil</a>

<?php if (!empty($_GET['type']) && ($_GET['type'] === 'success')) : ?>
    <div class='row'>
        <div class='alert alert-success'>
            Succès! <?= $_GET['message'] ?>
        </div>
    </div>
<?php elseif (!empty($_GET['type']) && ($_GET['type'] === 'error')) : ?>
    <div class='row'>
        <div class='alert alert-danger'>
            Erreur! <?= $_GET['message'] ?>
        </div>
    </div>
<?php endif; ?>
<div class='row'>
    <h1 class='col-md-12 text-center border border-dark text-white bg-primary'>Membres</h1>
</div>
<div class='row'>
    <table class='table table-striped'>
        <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Prénom</th>
                <th scope='col'>Nom</th>
                <th scope='col'>Adresse</th>
                <th scope='col'>Abo</th>
                <th scope='col'>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($membres as $m) : ?>
                <tr>
                    <td><?= $member['id'] ?></td>
                    <td><?= htmlentities($member['prenom']) ?></td>
                    <td><?= htmlentities($member['nom']) ?></td>
                    <td><?= htmlentities($member['adresse']) ?></td>
                    <td><?= htmlentities($member['titre']) ?></td>
                    <td>
                        <a class='btn btn-primary' href='member-form.php?id=<?= $member['id'] ?>' role='button'>Modifier</a>
                        <a class='btn btn-danger' href='delete-member.php?id=<?= $member['id'] ?>' role='button'>Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class='row'>
    <div class='col'>
        <a class='btn btn-success' href='member-form.php' role='button'>Ajouter membre</a>
    </div>
</div>
