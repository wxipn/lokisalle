<?php
function set_commande($id_membre, $id_produit)
{
    global $bdd;

    $req = $bdd->prepare("INSERT INTO commande (`id_membre`, `id_produit`, `date_enregistrement`) 
							VALUES (:id_membre, :id_produit, NOW())");

    $req->execute(array(
            'id_membre' => $id_membre,
            'id_produit' => $id_produit,
            ));
}
function set_produit($id_produit)
{
    global $bdd;

    $req = $bdd->prepare("UPDATE produit SET etat = 'reservation' WHERE id_produit = :id_produit");

    $req->execute(array(
            'id_produit' => $id_produit,
            ));
}