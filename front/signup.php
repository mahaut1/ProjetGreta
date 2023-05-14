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
            <a class="nav-link" href="#">Catégories</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="http://localhost/ProjetGreta/front/login.php">se connecter</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="http://localhost/ProjetGreta/front/signup.php">S'inscrire</a>
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
	<form method="POST" action="/data/users.csv">
			<div class="form-group">
				<div class="col-md-6">
			<label for="Username" class="form-label">username</label>
			<input type="text" name="username" placeholder="username" required="">
			</div>
			<div class="col-md-6">
			<label for="email" class="form-label">Votre email</label>
			<input type="text" name="nom" placeholder="email" required="">
			</div>
			<div class="col-md-6">
			<label for="Nom" class="form-label">Votre Nom</label>
			<input type="text" name="nom" placeholder="Nom" required="">
			</div>
			<div class="col-md-6">
			<label for="Prénom" class="form-label">Votre Prénom</label>
			<input type="text" name="prénom" placeholder="prénom" required="">
			</div>
			<div class="col-md-6">
			<label for="Téléphone" class="form-label">Votre numero de téléphone</label>
			<input type="tel" name="telephone" placeholder="telephone">
			</div>
			<div class="col-md-6">
			<label for="Date_naissance" class="form-label">Votre date de naissance</label>
			<input type="date" name="date_naissance" placeholder="Votre date de naissance">
			</div>
			<div class="col-md-6">
			<label for="Adresse_postale" class="form-label">Votre adresse postale</label>
			<input type="text" name="adresse_postale" placeholder="Votre adresse potale">
			</div>
			<div class="col-md-6">
			<label for="Code_postal" class="form-label">Votre code postal</label>
			<input type="text" name="code_postal" placeholder="Votre code postale">
			</div>
			<div class="col-md-6">
			<label for="Date_naissance" class="form-label">Votre date de naissance</label>
			<input type="date" name="date_naissance" placeholder="Votre date de naissance">
			</div>
			<div class="col-md-6">
		
</form>