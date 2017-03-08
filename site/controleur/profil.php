<?php
include_once('controleur/connexion.php');
include_once('modele/set_commande.php');
include_once('modele/get_commande.php');
include_once('modele/get_set_inscription.php');

$id_membre = $_SESSION['membre']['id_membre'];

if($_POST){
	if(isset($_POST) && $_POST != ''){
		$id_salle = $_POST['salle'];
		$id_produit = $_POST['produit'];
		$commande = set_commande($id_membre, $id_produit);
		if($commande = true){
			$produit = set_produit($id_produit);
		}
	}
}

$commandes = get_commande($id_membre);

$membre = getMembre($id_membre);

// On affiche les page (vues)
include_once('vue/include/header.php');
include_once('vue/include/navbar.php');

include_once('vue/profil.php');
include_once('vue/include/footer.php');