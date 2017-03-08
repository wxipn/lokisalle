<?php
include_once('../modele/connexion_sql.php');
include_once('../modele/del_modal.php');


//GESTION SALLES
$id = $_POST['id_salle'];
if(isset($_POST) && $_POST['modal'] == 'delete-salle'){
	delModal($id);
}

//GESTION PRODUITS
$id = $_POST['id_produit'];
if(isset($_POST) && $_POST['modal'] == 'delete-produit'){
	delModalProduit($id);
}

//GESTION MEMBRES
$id = $_POST['id_membre'];
if(isset($_POST) && $_POST['modal'] == 'delete-membre'){
	delModalMembre($id);
}

//GESTION AVIS
$id = $_POST['id_avis'];
if(isset($_POST) && $_POST['modal'] == 'delete-avis'){
	delModalAvis($id);
}

//GESTION COMMANDE
$id = $_POST['id_commande'];
if(isset($_POST) && $_POST['modal'] == 'delete-commande'){
	delModalCommande($id);
}