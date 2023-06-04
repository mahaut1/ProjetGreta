
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
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
            <a class="nav-link active" aria-current="page" href="#">Accueil</a>
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
        
        </ul>
        <span class="navbar-text">
          Site de petites annonces communautaire
        </span>
      </div>
    </div>
  </nav>


<div class="Creation_Annonce" action="">
<form method="POST">
  
<label for="Creation_annonce" aria-hidden="true">Créer votre annonce</label>
 <div class="mb-3">
  <label for="Titre_Annonce" class="form-label">Titre de l'annonce</label>
  <input type="text" class="form-control" name ="Titre_annonce" id="Titre_annonce" placeholder="Votre titre">
</div>
<div class="mb-3">
  <label for="description_annonce" class="form-label">Description de l'annonce</label>
  <input type="textarea" class="form-control" name="Description_annonce" id="Description_annonce" placeholder="Votre titre">
</div>
<div class="mb-3">
  <input type="hidden" class="form-control" name="date_creation" id="date_creation">
</div>
<div class="mb-3">
  <label for="date_creation" class="form-label">Date de création</label>
  <input type="textarea" class="form-control" name="Date de création" id="Date de création">
</div>
<div class="mb-3">
  <label for="Prix_vente" class="form-label">Prix de vente</label>
  <input type="textarea" class="form-control" name="Date de création" id="Date de création">
</div>

</form>