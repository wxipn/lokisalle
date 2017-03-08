<?php
session_start();

function get_membre()
{
	global $bdd;
	
	$req = $bdd->prepare('SELECT id_membre, pseudo, mdp, statut FROM membre WHERE pseudo= :pseudo AND mdp= :password');
	$req->execute(array(
		':pseudo' => $_POST['pseudo'],
		':password' => $_POST['password']));

	$resultat = $req->fetch();
	return $resultat;

}