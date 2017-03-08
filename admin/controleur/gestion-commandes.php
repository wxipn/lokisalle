<?php
//On appelle les modèles
include_once('modele/get_commandes.php');

//On inclue la fonction du controleur
$commandes = get_commandes();


//On affiche les vues
include_once('vue/include/header.php');
include_once('vue/include/navbar.php');

include_once('vue/gestion-commandes.php');
include_once('vue/include/footer.php');