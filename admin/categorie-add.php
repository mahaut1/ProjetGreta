
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
<nav class="navbar bg-dark border-bottom border-bottom-dark" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Site de petites annonces communautaire</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="http://localhost/ProjetGreta/index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/ProjetGreta/admin/users.php">Membres</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Annonces</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/ProjetGreta/admin/categorie-add.php">Ajouter une Catégorie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/ProjetGreta/admin/categories.php">Catégorie</a>
          </li>

        
        </ul>
  
      </div>
    </div>
  </nav>
<div class="album py-5 bg-light">
<div class="container">

    <div class="row">
        <h1>Ajouter une categorie</h1>
        <div class="col-lg-12">
            <form method="POST" name="category" action="">
                <div class="form-group">
                    <label for="name">nom</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="name">description</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div>
                <button type="submit" class="btn btn-primary">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>