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
					$id_salle = $_POST['id_salle'];

					mupdate_salle($name, $val, $id_salle);
				}
			}
			
		}
		echo 'Vos informations ont été enregistrées';
	}
}


?>