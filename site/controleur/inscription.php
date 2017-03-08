<?php
//Inclusion du modele
include_once('modele/get_set_inscription.php');


if($_POST)
{
	// debug($_POST);
	//--------- CONTROLES ET ERREURS :
	$erreur2 = '';
	// controle de la taille (pseudo)
	if(strlen($_POST['pseudo']) < 3 || strlen($_POST['pseudo']) > 20)
	{ // si la taille est inférieur (ou égal) a 3 ou supérieur a 20. erreur !!
		$erreur2 .= '<div class="erreur">Votre pseudo doit être compris entre 3 MIN et 20 caractères MAX</div>';
	}
	// controle du format (pseudo)
	if(!preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['pseudo']))
	{
		$erreur2 .= '<div class="erreur">erreur format/caractere pseudo</div>';
	}
	// controle de la disponibilité (pseudo)
	$membre_exist = get_membre_exist(); // selection du pseudo dans notre bdd
	if($membre_exist) // s'il y a 1 résultat ou plus...
	{
		$erreur2 .= '<div class="erreur">pseudo indisponible !</div>'; // le pseudo est déjà reservé!
	}
	
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$erreur2 .= 'Cet email a un format non adapté.';
	} 
	
	$mail_exist = get_email_exist();
	if($mail_exist) // s'il y a 1 résultat ou plus...
	{
		$erreur2 .= '<div class="erreur">email déjà présent !</div>'; // le pseudo est déjà reservé!
	}
	//--------- VALIDATION ET INSCRIPTION DU MEMBRE :
	$contenu='';
	if(empty($erreur2))
	{
		// $_POST['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT); // cryptage du mdp.
		set_membre($_POST['pseudo'], $_POST['password'], $_POST['nom'], $_POST['prenom'], $_POST['email'], 
					$_POST['civilite']);

		$contenu .= "<div class='validation'>Vous êtes inscrit à notre site web. Connectez-vous pour réserver</u></div>";
		// redirection vers l'url du site (index) > la page connexion
	}
	
	//--------- TRANSMISSION DES ERREURS AU CONTENU (pour l'affichage) :
	$contenu .= $erreur2;	
}

// On affiche les page (vues)
include_once('vue/include/header.php');
include_once('vue/include/navbar.php');

include_once('vue/inscription.php');
include_once('vue/include/footer.php');