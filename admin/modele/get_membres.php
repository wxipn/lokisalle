<?php
function get_membres()
{
	global $bdd;
	
	$req = $bdd->prepare('SELECT id_membre, pseudo, nom, prenom, email, civilite, statut, date_enregistrement FROM membre ORDER BY id_membre');
	$req->execute();
    $membres = $req->fetchAll();
	
    return $membres;
}

function get_membre($id)
{
	global $bdd;
	
	$req = $bdd->prepare('SELECT id_membre, pseudo, nom, prenom, email, civilite, statut, date_enregistrement FROM membre WHERE id_membre = :idMembre');
	$req->execute(array(
		':idMembre' => $id));
    $membre = $req->fetchAll();
	
    return $membre;
}