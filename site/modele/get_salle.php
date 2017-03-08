<?php
function get_salle($id_salle){
	global $bdd;
	
	$req = $bdd->prepare('SELECT s.id_salle, p.id_produit, titre, description, photo, ville, adresse, cp, capacite, categorie, DATE_FORMAT(date_arrivee, \'%d/%m/%Y\') AS date_arrivee_fr, DATE_FORMAT(date_depart, \'%d/%m/%Y\') AS date_depart_fr, p.prix 
							FROM salle s
								LEFT JOIN produit p ON s.id_salle = p.id_salle
									WHERE s.id_salle = :id_salle');
	$req->execute(array(
				'id_salle' => $id_salle));
    $salle = $req->fetchAll();
	
    return $salle;
}

function get_salles_ville($ville){
	global $bdd;
	
	$req = $bdd->prepare('SELECT titre, photo, id_salle, ville FROM salle WHERE ville = :ville LIMIT 4');

	$req->execute(array(
				'ville' => $ville));
    $salle = $req->fetchAll();
	
    return $salle;
}