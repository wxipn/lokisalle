<?php
function get_avis()
{
	global $bdd;
	
	$req = $bdd->prepare('SELECT a.id_avis, a.id_membre, a.id_salle, a.commentaire, a.note, DATE_FORMAT(a.date_enregistrement, \'%d/%m/%Y\') AS date_enregistrement_fr, m.email, s.titre, s.categorie 
							FROM avis a 
								INNER JOIN membre m
									ON a.id_membre = m.id_membre 
										INNER JOIN salle s
											ON a.id_salle = s.id_salle
												ORDER BY id_avis');
	$req->execute();

    $avis = $req->fetchAll();
	
    return $avis;
}

function get_avisModal($id)
{

    global $bdd;

    $req = $bdd->prepare('SELECT id_avis, id_membre, id_salle, commentaire, note, date_enregistrement FROM avis WHERE id_avis= :idAvis');
	$req->execute(array(
		':idAvis' => $id));

    $infos_salle = $req->fetchAll();
	
    return $infos_salle;
}