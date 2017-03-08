<?php

function get_categories()
{
	global $bdd;
	
	$req = $bdd->prepare('SELECT DISTINCT categorie FROM salle');
	$req->execute();
    $categories = $req->fetchAll();
	
    return $categories;
}

function get_villes()
{
	global $bdd;
	
	$req = $bdd->prepare('SELECT DISTINCT ville FROM salle');
	$req->execute();
	$villes = $req->fetchAll();
	
	return $villes;
}

function get_capacites()
{
	global $bdd;
	
	$req = $bdd->prepare('SELECT capacite, id_salle FROM salle GROUP BY capacite ASC');
	$req->execute();
	$capacites = $req->fetchAll();
	
	return $capacites;
}

function get_salles()
{
	global $bdd;
	
	$req = $bdd->prepare('SELECT s.id_salle, s.titre, s.description, s.photo, s.pays, s.ville, s.adresse, s.cp, s.capacite, s.categorie, DATE_FORMAT(date_arrivee, \'%d/%m/%Y\') AS date_arrivee_fr, DATE_FORMAT(date_depart, \'%d/%m/%Y\') AS date_depart_fr, p.prix, p.etat 
							FROM salle s
								LEFT JOIN produit p
									ON s.id_salle = p.id_salle
										WHERE p.etat = "libre"
											AND date_arrivee > NOW()
												ORDER BY id_salle');
	$req->execute();
	$salles = $req->fetchAll();
	
	return $salles;
}