<?php
function set_produits($id_salle, $arr, $depa, $prix)
{
    global $bdd;

    $req = $bdd->prepare("INSERT INTO produit (`id_salle`, `date_arrivee`, `date_depart`, `prix`, `etat`) 
							VALUES (:id_salle, :date_arrivee, :date_depart, :prix, 'libre')");
							
    $req->execute(array(
            'id_salle' => $id_salle,
            'date_arrivee' => $arr,
            'date_depart' => $depa,
			'prix' => $prix,
            ));

	return $req;
}