<?php

function get_salles($tri, $ordre)
{

    global $bdd;

    $req = $bdd->prepare('SELECT id_salle, titre, description, photo, pays, ville, adresse, cp, capacite, categorie FROM salle ORDER BY '.$tri.' '.$ordre.'');
    $req->execute();

    $salles = $req->fetchAll();
    return $salles;
}



function get_salle($id)
{

    global $bdd;

    $req = $bdd->prepare('SELECT id_salle, titre, description, photo, pays, ville, adresse, cp, capacite, categorie FROM salle WHERE id_salle= :idSalle');
	$req->execute(array(
		':idSalle' => $id));

    $infos_salle = $req->fetchAll();
	
    return $infos_salle;
}