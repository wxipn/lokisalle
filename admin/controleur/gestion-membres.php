<?php
include_once('modele/get_membres.php');
include_once('modele/set_membres.php');



if(isset($_POST['bouton']))
{
	if($_POST['pseudo'] !='' && $_POST['nom'] !='' && $_POST['prenom'] !='' && $_POST['email'] !=''){
		$_POST['date_enregistrement'] = date('Y-m-d h:i:s');
		
		set_membres($_POST['pseudo'], $_POST['mdp'], $_POST['nom'], $_POST['prenom'], $_POST['email'], 
					$_POST['civilite'], $_POST['statut'], $_POST['date_enregistrement']);

	} else {
		$remplir = '<p style="color:red">merci de remplir tous les champs</p>';
	}

}

$membres = get_membres();






include_once('vue/include/header.php');
include_once('vue/include/navbar.php');

include_once('vue/gestion-membres.php');
include_once('vue/include/footer.php');