<?php

//GESTION SALLES
function delModal($id)
{
	global $bdd;

	if (isset($id) && !empty($id)) {
		 $sql = "DELETE FROM salle WHERE id_salle = :id";
		 $q = array('id' => $id);
		 $req = $bdd -> prepare($sql);
		 $req -> execute($q);
		 
		 $sql1 = "DELETE FROM avis WHERE id_salle = :id";
		 $q1 = array('id' => $id);
		 $req1 = $bdd -> prepare($sql1);
		 $req1 -> execute($q1);
		 
		 $sql2 = "DELETE FROM produit WHERE id_salle = :id";
		 $q2 = array('id' => $id);
		 $req2 = $bdd -> prepare($sql2);
		 $req2 -> execute($q2);
	}
}

//GESTION PRODUITS
function delModalProduit($id){
	global $bdd;

	if (isset($id) && !empty($id)) {
		 $sql = "DELETE FROM produit WHERE id_produit = :idProduit";
		 $q = array('idProduit' => $id);
		 $req = $bdd -> prepare($sql);
		 $req -> execute($q);
	}
}

//GESTION MEMBRES
function delModalMembre($id){
	global $bdd;

	if (isset($id) && !empty($id)) {
		 $sql = "DELETE FROM membre WHERE id_membre = :idMembre";
		 $q = array('idMembre' => $id);
		 $req = $bdd -> prepare($sql);
		 $req -> execute($q);
		 
		 $sql1 = "DELETE FROM avis WHERE id_membre = :idMembre";
		 $q1 = array('idMembre' => $id);
		 $req1 = $bdd -> prepare($sql1);
		 $req1 -> execute($q1);
	}	
}

//GESTION AVIS
function delModalAvis($id){
	global $bdd;

	if (isset($id) && !empty($id)) {
		 $sql = "DELETE FROM avis WHERE id_avis = :idAvis";
		 $q = array('idAvis' => $id);
		 $req = $bdd -> prepare($sql);
		 $req -> execute($q);
	}	
}

//GESTION COMMANDE
function delModalCommande($id){
	global $bdd;

	if (isset($id) && !empty($id)) {
		 $sql = "DELETE FROM commande WHERE id_commande = :idCommande";
		 $q = array('idCommande' => $id);
		 $req = $bdd -> prepare($sql);
		 $req -> execute($q);
	}	
}