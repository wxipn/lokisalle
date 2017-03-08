<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('modele/recherche.php');

//Function pour remodeler la date en DATETIME
function changedatefrus($datefr)
	{
	$dateus=$datefr{6}.$datefr{7}.$datefr{8}.$datefr{9}."-".$datefr{3}.$datefr{4}."-".$datefr{0}.$datefr{1};
	return $dateus;
}

$recherche_vide ='';
if($_POST){

	if(isset($_POST['categorie']) && $_POST['categorie'] !='' && isset($_POST['ville']) && $_POST['ville']  !=''){ 

		$categorie = $_POST['categorie'];
		$ville = $_POST['ville'];
		$capacite = $_POST['capacite'];
		$prix = $_POST['prix'];
		$prix = str_replace(',', ' AND ', $prix);

		$date_a = $_POST['date_arrivee'];
		$DateArr = changedatefrus($date_a);


		$date_d = $_POST['date_depart'];
		$DateDep = changedatefrus($date_d);
		
		$resultats  = recherche($categorie, $ville, $capacite, $prix, $DateArr, $DateDep);
		
		
	} else {
		$recherche_vide .= 'Vous devez rechercher sur tous les champs !!<br>';
	}
	
		if(isset($resultats) &&  $resultats!= false){
			$resultats;
		} else {
			$recherche_vide .= 'Votre recherche ne comporte aucun résultat !!';
		}
}



// On affiche les page (vues)
include_once('vue/include/header.php');
include_once('vue/include/navbar.php');
include_once('vue/recherche.php');

include_once('vue/include/footer.php');