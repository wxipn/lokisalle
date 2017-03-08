<?php
include_once('connexion_sql.php');

function mupdate_salle($name, $val, $id_salle)
{
    global $bdd;

    $req = $bdd->prepare('UPDATE salle SET '.$name.' = "'.$val.'" WHERE id_salle = '.$id_salle.'');
    $req->execute();
	var_dump($req);
}

function mupdate_produit($name, $val, $id_produit)
{
    global $bdd;

    $req = $bdd->prepare('UPDATE produit SET '.$name.' = "'.$val.'" WHERE id_produit = '.$id_produit.'');
    $req->execute();
}

function mupdate_membre($name, $val, $id_membre)
{
    global $bdd;

    $req = $bdd->prepare('UPDATE membre SET '.$name.' = "'.$val.'" WHERE id_membre = '.$id_membre.'');
    $req->execute();
}

function mupdate_avis($name, $val, $id_avis)
{
    global $bdd;

    $req = $bdd->prepare('UPDATE avis SET '.$name.' = "'.$val.'" WHERE id_avis = '.$id_avis.'');
    $req->execute();
}