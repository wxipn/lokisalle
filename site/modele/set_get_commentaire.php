<?php
function set_commentaire($message, $rate, $id_salle, $membre)
{
    global $bdd;

    $req = $bdd->prepare("INSERT INTO avis (`id_membre`, `id_salle`, `commentaire`, `note`, `date_enregistrement`) 
							VALUES (:membre, :id_salle, :message, :rate, NOW())");

    $req->execute(array(
            'membre' => $membre,
            'id_salle' => $id_salle,
            'message' => $message,
			'rate' => $rate,
            ));

	return $req;
}

function get_commentaire($id_salle){
	global $bdd;
	
	$req = $bdd->prepare('SELECT a.id_avis, a.id_membre, a.id_salle, a.commentaire, a.note, m.pseudo, DATE_FORMAT(a.date_enregistrement, \'%d/%m/%Y\') AS date_enregistrement_fr 
							FROM avis a 
								LEFT JOIN membre m ON a.id_membre = m.id_membre
									WHERE a.id_salle = :id_salle ORDER BY date_enregistrement_fr DESC');
	$req->execute(array(
					'id_salle' => $id_salle));
    $commentaires = $req->fetchAll();
	
    return $commentaires;
}