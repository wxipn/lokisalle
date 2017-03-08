<?php
include_once('controleur/top.php');

function internauteEstConnecte()
{ // cette fonction m'indique si le membre est connecté. (une fonction retourne toujours false par défault)
    if(!isset($_SESSION['membre'])) // si la session membre est non définie
    {
        return false;
    }
    else
    {
        return true;
    }  
}
$internauteEstConnecte = internauteEstConnecte();


function internauteEstConnecteEtEstAdmin()
{// cette fonction m'indique si le membre est admin
    if(internauteEstConnecte() && $_SESSION['membre']['statut'] == 1) // si la session du membre est définie , nous regardons si il est admin
    {
       return true;
    }
    else
    {
    return false;
    }
}
$internauteEstConnecteEtEstAdmin = internauteEstConnecteEtEstAdmin();
// On affiche les page (vues)
include_once('vue/include/header.php');
include_once('vue/include/navbar.php');

include_once('vue/top.php');
include_once('vue/include/footer.php');