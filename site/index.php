<?php
include_once('modele/connexion_sql.php');
if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    include_once('controleur/index.php');
}
else if($_GET['section'] == 'logout')
{
    include_once('vue/logout.php');
}
else if($_GET['section'] == 'salle')
{
    include_once('controleur/salle.php');
}
else if($_GET['section'] == 'inscription')
{
    include_once('controleur/inscription.php');
}
else if($_GET['section'] == 'profil')
{
    include_once('controleur/profil.php');
}
else if($_GET['section'] == 'mentions')
{
    include_once('controleur/mentions.php');
}
else if($_GET['section'] == 'recherche')
{
    include_once('controleur/recherche.php');
}