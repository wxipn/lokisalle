<?php
//Inclusion du modele
include_once('modele/get_index.php');
include_once('controleur/connexion.php');


//appelle des fonctions
$categories = get_categories();
$villes = get_villes();
$capacites = get_capacites();
$salles = get_salles();


// On affiche les page (vues)
include_once('vue/include/header.php');
include_once('vue/include/navbar.php');

include_once('vue/index.php');
include_once('vue/include/footer.php');