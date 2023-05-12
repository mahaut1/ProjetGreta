<div class="main">  	
	<input type="checkbox" id="chk" aria-hidden="true">
	<div class="signup">
		<form method="POST" action="">
			<label for="chk" aria-hidden="true">Enregistrement</label>
			<input type="hidden" name="action" value="signup"> 
			<input type="text" name="nom" placeholder="Nom" required="">
            <input type="text" name="prenom" placeholder="prenom">
            <input type="date" name="date_naissance" placeholder="date_naissance">
            <input type ="tel" name="telephone" placeholder="telephone">
            <input type="text" name="username" placeholder="username">
			<input type="email" name="email" placeholder="Email" required=""> 
            <input type="text" name="adresse_postale" placeholder="adresse_postale">
            <input type="text" name="code_postal" placeholder="code_postal">
            <input type="text" name="ville" placeholder="ville">
            <input type="datetime-local" name="date_inscription" placeholder="date_inscription">
			<input type="password" name="pwd" placeholder="Mot de passe" required="" pattern="^(?=.*\d)(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,}$" title="Le mot de passe doit comporter au moins 8 caractères dont au moins 1 chiffre, 1 minuscule, 1 majuscule et 1 caractères spécial">
			<input type="password" name="pwd2" placeholder="Confirmation du mot de passe" required="">
			<button>Enregistrement</button>
		</form>
	</div>

