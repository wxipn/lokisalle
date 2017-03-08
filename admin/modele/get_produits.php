<?php
function get_produits()
{

    global $bdd;

    $req = $bdd->prepare('SELECT p.id_produit, p.id_salle, s.titre, s.photo, DATE_FORMAT(p.date_arrivee, \'%d/%m/%Y\') AS date_arrivee_fr, DATE_FORMAT(p.date_depart, \'%d/%m/%Y\') AS date_depart_fr, p.prix, p.etat 
							FROM produit p
								LEFT JOIN salle s ON p.id_salle = s.id_salle
								ORDER BY id_produit');
    $req->execute();
    $produits = $req->fetchAll();

    return $produits;
}

function get_id_salle()
{
	global $bdd;
	
	$req = $bdd->prepare('SELECT id_salle, titre, adresse, cp, ville, capacite FROM salle ORDER BY id_salle');
	$req -> execute();
	$id_salle = $req->fetchAll();
	
	return $id_salle;
}

function get_produit($id)
{

    global $bdd;

    $req = $bdd->prepare('SELECT id_produit, id_salle, date_arrivee, date_depart, prix, etat FROM produit WHERE id_produit = :idSalle');
    $req->execute(array(
		':idSalle' => $id));
    $produit = $req->fetchAll();

    return $produit;
}