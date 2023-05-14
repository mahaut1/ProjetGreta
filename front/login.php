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

<div class="login" action="">
		<form method="POST">

			<label for="chk" aria-hidden="true">Login</label>
			<input type="hidden" name="action" value="login">
			<input type="email" name="email" placeholder="Email" required="">
			<input type="password" name="pwd" placeholder="Mot de passe" required="">
			<button>Login</button>
			<a href="?p=forgot">Mot de passe oublié ?</a><!-- Je change le paramètre d'URL à forgot, mais je reste sur l'index
		</form>
	</div>
</div>