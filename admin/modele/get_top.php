<?php
function get_top_salles()
{
	global $bdd;
	
	$req = $bdd->prepare('SELECT AVG(note) 
							AS note_moyenne, s.titre
								FROM avis a 
									INNER JOIN salle s 
										ON a.id_salle = s.id_salle 
											GROUP BY a.id_salle ORDER BY note_moyenne DESC LIMIT 5');
	$req->execute();
    $top_best_rate = $req->fetchAll();
	
    return $top_best_rate;
}

function get_top_commande()
{
	global $bdd;
	
	$req = $bdd->prepare('SELECT c.id_produit, p.id_salle, s.titre, COUNT(c.id_produit) AS nombre 
							FROM commande c
								INNER JOIN produit p ON c.id_produit = p.id_produit 
									LEFT JOIN salle s ON p.id_salle = s.id_salle
										GROUP BY id_produit 
											ORDER BY nombre DESC LIMIT 5');
	$req->execute();
	$top_commandes = $req->fetchAll();
	
	return $top_commandes;
}

function get_members_top()
{
	global $bdd;
	
	$req = $bdd->prepare('SELECT c.id_membre, c.id_produit, m.pseudo, COUNT(c.id_membre) AS nombre 
							FROM commande c 
								LEFT JOIN membre m ON c.id_membre = m.id_membre 
									GROUP BY id_membre 
										ORDER BY nombre DESC LIMIT 5');
	$req->execute();

	$members_top = $req->fetchAll();
	
	return $members_top;
}

function get_membres_prix($nbcommande)
{
	global $bdd;

	
	$req = $bdd->prepare('SELECT c.id_membre, c.id_produit, m.pseudo, p.prix, AVG(prix) AS prix_total 
							FROM commande c 
								INNER JOIN membre m ON c.id_membre = m.id_membre 
									LEFT JOIN produit p ON c.id_produit = p.id_produit GROUP BY id_membre ASC LIMIT 5');
	$req->execute();
	//print_r($req);
	//die();
	$members_prix = $req->fetchAll();
	
	return $members_prix;
}