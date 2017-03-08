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
					$id_avis = $_POST['id_avis'];

					mupdate_avis($name, $val, $id_avis);
				}
			}
			
		}
		echo 'Vos informations ont été enregistrées';
	}
}