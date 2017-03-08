<?php
function get_commandes()
{
	global $bdd;
	
	$req = $bdd->prepare('SELECT c.id_commande, c.id_membre, c.id_produit, DATE_FORMAT(c.date_enregistrement, \'%d/%m/%Y\') AS date_enregistrement_fr, m.id_membre, m.email, s.id_salle, s.titre, DATE_FORMAT(p.date_arrivee, \'%d/%m/%Y\') AS date_arrivee_fr, DATE_FORMAT(p.date_depart, \'%d/%m/%Y\') AS date_depart_fr, p.prix  
							FROM commande c 
								INNER JOIN membre m
									ON c.id_membre = m.id_membre 
										INNER JOIN produit p
											ON c.id_produit = p.id_produit
												INNER JOIN salle s
													ON p.id_salle = s.id_salle
														ORDER BY id_commande');
	$req->execute();

    $commandes = $req->fetchAll();
	
    return $commandes;
}

function get_commandeModal($id)
{
	global $bdd;
	
	$req = $bdd->prepare('SELECT * FROM commande WHERE id_commande = :idCommande');
	$req->execute(array(
		':idCommande' => $id));
	
    $commandes_modal = $req->fetchAll();
	
    return $commandes_modal;
}