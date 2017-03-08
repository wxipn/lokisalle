<?php
//On appelle les modèles
include_once('modele/get_top.php');

//On inclue la fonction du controleur
$top_best_rate = get_top_salles();
$top_commandes = get_top_commande();
$members_top = get_members_top();

foreach($members_top as$key => $member_top){
$nbcommande = $member_top['nombre'];

}
 $members_prix = get_membres_prix($nbcommande);


//On affiche les vues
include_once('vue/include/header.php');
include_once('vue/include/navbar.php');

include_once('vue/top.php');
include_once('vue/include/footer.php');