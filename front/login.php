<?php
include_once "../view/header.php";
?>
  
  <main>
	<div class="login">
		<form method="POST" action="">

			<label for="Login" aria-hidden="true">Login</label>
      <div>
			<input type="hidden" name="action" value="login">
      </div>
      <div>
      <label for="e-mail" class="form-label">Votre email</label>
			<input type="email" class="form-control" name="email" placeholder="Email" required="">
      </div>
      <div>
      <label for="pwd" class="form-label">Mot de passe</label>
			<input type="password" class="form-control" name="pwd" placeholder="Mot de passe" required="">
      </div>
      <button>Login</button>
			<a href="?p=forgot">Mot de passe oublié ?</a>
		</form>
	</div>
</div>
</main>