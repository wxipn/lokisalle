<?php
//On appelle les modèles
include_once('../modele/modal_update.php');

if($_POST){

//var_dump($_POST);
	if(is_array($_POST)){
		foreach($_POST as $keys => $value){
			if (is_array($value)) {
				foreach($value as $key => $valeur){
					$name = $valeur['name'];
					$val = $valeur['value'];
					$id_produit = $_POST['id_produit'];

					mupdate_produit($name, $val, $id_produit);
				}
			}
			
		}
		echo 'Vos informations ont été enregistrées';
	}
}


?>