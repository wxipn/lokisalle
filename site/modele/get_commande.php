<?php
function get_commande($id_membre){
	global $bdd;
	
	$req = $bdd->prepare('SELECT c.id_commande, c.id_membre, c.id_produit, DATE_FORMAT(date_enregistrement, \'%d/%m/%Y\') AS date_enregistrement_fr, s.titre, s.ville, p.prix, DATE_FORMAT(p.date_arrivee, \'%d/%m/%Y\') AS date_arrivee_fr, DATE_FORMAT(p.date_depart, \'%d/%m/%Y\') AS date_depart_fr 
							FROM commande c
								LEFT JOIN produit p ON c.id_produit = p.id_produit
									LEFT JOIN salle s ON p.id_salle = s.id_salle
									WHERE c.id_membre = :id_membre');
	$req->execute(array(
		'id_membre' => $id_membre,
	));

    $commande = $req->fetchAll();
	
	
    return $commande;
}