<?php
//On appelle les modèles
include_once('modele/get_avis.php');

//On inclue la fonction du controleur
$avis = get_avis();


//On affiche les vues
include_once('vue/include/header.php');
include_once('vue/include/navbar.php');

include_once('vue/gestion-avis.php');
include_once('vue/include/footer.php');