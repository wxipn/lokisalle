<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=;charset=utf8', '', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>