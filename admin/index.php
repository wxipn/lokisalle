<?php

include_once('modele/connexion_sql.php');
if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    include_once('controleur/index.php');
}
else if($_GET['section'] == 'gestion-salles')
{
    include_once('controleur/gestion-salles.php');
}
else if($_GET['section'] == 'gestion-produits')
{
    include_once('controleur/gestion-produits.php');
}
else if($_GET['section'] == 'gestion-membres')
{
    include_once('controleur/gestion-membres.php');
}
else if($_GET['section'] == 'gestion-avis')
{
    include_once('controleur/gestion-avis.php');
}
else if($_GET['section'] == 'gestion-commandes')
{
    include_once('controleur/gestion-commandes.php');
}
else if($_GET['section'] == 'top')
{
    include_once('controleur/top.php');
}
else if($_GET['section'] == 'modal')
{
    include_once('controleur/modal.php');
}
