<?php
session_start();
require_once "modele.php";


$p= $_GET['p'] ?? "";

if($_SERVER["REQUEST_METHOD"] === "POST"){
	$action= $_POST['action'] ?? "";
	switch ($action){
		case 'signup':
			$message=addUser();
			break;
		case 'login':
			$message=logUser();
			$p="home";
			break;
		case 'forgot':
			$message=waitReset();
			$p="home";
			break;
		case 'reset':
			$message=resetPwd();
			$p="signup";
	}
}

if ($p=='activation')
		$message=activUser();
if ($p=='deconnect'){
	session_unset();
	session_destroy();
	$message=array("success", "Vous êtes déconnecté");
}
if ($p=='reset' && !isset($_GET['t'])){
	$message=array("error", "Lien invalide. Veuillez réessayer");
	$p="forgot";
}

$logged = $_SESSION['is_login'] ?? false;

include "view/header.php";
switch ($p) {
	case 'forgot':
		include "view/forgot.php";	
		break;	
	case 'reset':
		$token=htmlspecialchars($_GET['t']);
		include "view/reset.php";	
		break;	
	case 'signup':
		include "front/signup.php";	
		break;
	case 'se connecter':
		include "front/login.php";
		break;
	case 'ajouter une annonce':
		include "front/FormulaireCreaAnnonce.php";
		break;
	case 'contact':
		include "front/contact.php";
		break;
	default:
		include "view/home.php";	
}
include "view/footer.php";