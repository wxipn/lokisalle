<?php
include_once('controleur/connexion.php');
include_once('modele/get_salle.php');
include_once('modele/set_get_commentaire.php');

$id_salle = $_GET['id'];
$ville = $_GET['ville'];

$salle = get_salle($id_salle);
$ville = get_salles_ville($ville);

if(isset($_POST['message'])){
$message = $_POST['message'];
}

if(isset($_POST['hidden'])){
$rate = $_POST['hidden'];
}

if(isset($_SESSION["membre"]["id_membre"])){
$membre = $_SESSION["membre"]["id_membre"];
}

$retour = '';
if($_POST){
	if(isset($_POST['message']) && $_POST['message'] != ""){
		set_commentaire($message, $rate, $id_salle, $membre);	
	}else {
		$retour .= 'Vous devez au moins rentrer un message !!';
	}
} 

$erreur3  = '';
$commentaires = get_commentaire($id_salle);
$erreur3 = 'Il n\'y a aucun commentaire pour le moment sur cette salle !!';






//var_dump($message);

// On affiche les page (vues)
include_once('vue/include/header.php');
include_once('vue/include/navbar.php');

include_once('vue/salle.php');
include_once('vue/include/footer.php');