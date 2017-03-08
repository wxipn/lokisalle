<?php
include_once('modele/set_produits.php');
include_once('modele/get_produits.php');

function changedatefrus($datefr)
	{
	$dateus=$datefr{6}.$datefr{7}.$datefr{8}.$datefr{9}."-".$datefr{3}.$datefr{4}."-".$datefr{0}.$datefr{1};
	return $dateus;
}
if(isset($_POST['bouton']))
{
	if($_POST['id_salle'] !='' && $_POST['date_arrivee'] !='' && $_POST['date_depart'] !='' && $_POST['prix'] !=''){

		//echo $_POST['date_arrivee'];
		$date_ar = $_POST['date_arrivee'];
		$DateArr = changedatefrus($date_ar);
		//$dateAr = date_create_from_format('j/m/Y H:i:s', $date_ar);
		//echo $dateAr.'<br>';
		

		$date_dep = $_POST['date_depart'];
		$DateDepa = changedatefrus($date_dep);


		
		set_produits($_POST['id_salle'], $DateArr, $DateDepa, $_POST['prix']);
	} else {
		$remplir = '<p style="color:red">merci de remplir tous les champs</p>';
	}
}

$id_salle = get_id_salle();

$produits = get_produits();


// On affiche les page (vues)
include_once('vue/include/header.php');
include_once('vue/include/navbar.php');
include_once('vue/gestion-produits.php');
include_once('vue/include/footer.php');