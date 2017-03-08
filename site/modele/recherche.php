<?php
	if(isset($_POST['categorie'])){
$categorie = $_POST['categorie'];
}else{
	$categorie ='';
}
function recherche($categorie, $ville, $capacite, $prix, $date_a, $date_d)
{
	global $bdd;
	
	$req = $bdd->prepare('SELECT s.id_salle, titre, description, photo, ville, adresse, cp, capacite, categorie, date_arrivee AS date_arrivee_fr, date_depart AS date_depart_fr, p.prix 
							FROM salle s
								LEFT JOIN produit p ON s.id_salle = p.id_salle
									WHERE categorie = :cate AND ville = :ville AND capacite > :capacite AND p.prix BETWEEN '.$prix.' AND date_arrivee >= :date_arrivee AND date_depart <= :date_depart');
	$req->execute(array(
	'cate' =>$categorie,
	'ville' =>$ville,
	'capacite' => $capacite,
	'date_arrivee' => $date_a,
	'date_depart' => $date_d,
	));

    $resultats = $req->fetchAll();

    return $resultats;
}