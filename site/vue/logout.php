<?php
// D�marrage ou restauration de la session
session_start();
// R�initialisation du tableau de session
// On le vide int�gralement
$_SESSION = array();
// Destruction de la session
session_destroy();
// Destruction du tableau de session
unset($_SESSION);
header('Location: index.php?section=index');