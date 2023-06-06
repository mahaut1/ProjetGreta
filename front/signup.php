<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Site de petites annonces</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <h1>Site de petites annonces</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Site de petites annonces communautaire</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="http://localhost/ProjetGreta/index.html">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Membres</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Annonces</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/ProjetGreta/front/categories.php">Catégories</a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/ProjetGreta/front/FormulaireCreaAnnonce.php">Créer une annonce</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="http://localhost/ProjetGreta/front/login.php">se connecter</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="http://localhost/ProjetGreta/front/signup.php">S'inscrire</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/ProjetGreta/front/contact.php">Nous contacter</a>
          </li>
        
        </ul>
        <span class="navbar-text">
          Site de petites annonces communautaire
        </span>
      </div>
    </div>
  </nav>

<div class="main">  	
	<div class="signup">
		<form method="POST" action="" enctype="multipart/form-data">
			<label for="chk" aria-hidden="true">Enregistrement</label>
      <div class="mb-3">
			<input type="hidden" name="action" value="signup">
    </div>
    <div class="mb-3">
    <label for="nom" class="form-label">Votre nom</label>
			<input type="text" class="form-control" name="nom" placeholder="Nom" required="">
    </div>
    <div class="mb-3">
    <label for="email" class="form-label">Votre email</label>
      <input type="email" class="form-control" name="email" placeholder="Email" required="">
    </div>	
    <div class="mb-3">
    <label for="password" class="form-label">Votre mot de passe</label>
      <input type="password" class="form-control" name="pwd" placeholder="Mot de passe" required="" pattern="^(?=.*\d)(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,}$" title="Le mot de passe doit comporter au moins 8 caractères dont au moins 1 chiffre, 1 minuscule, 1 majuscule et 1 caractères spécial">
    </div>
    <div class="mb-3">
    <label for="password2" class="form-label">Confirmez votre mot de passe</label>
      <input type="password" class="form-control" name="pwd2" placeholder="Confirmation du mot de passe" required="">
    </div>	
    <div class="mb-3">
    <label for="avatar" class="form-label">Votre avatar</label>
      <input type="file" class="form-control" name="avatar[]" accept="image/*" multiple>
    </div>
      <button>Enregistrement</button>
		</form>
	</div>
  
			
