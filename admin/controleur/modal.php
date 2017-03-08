<?php
include_once('../modele/connexion_sql.php');
include_once('../modele/get_salles.php');
include_once('../modele/get_produits.php');
include_once('../modele/get_membres.php');
include_once('../modele/get_avis.php');
include_once('../modele/get_commandes.php');
include_once('../modele/modal_update.php');

if(isset($_POST) && $_POST['modal'] == 'see-salle'){
$salles = get_salle($_POST['id_salle']);
	foreach($salles as $salle){
		$titre = $salle['titre'];
		$description = $salle['description'];
		$pays = $salle['pays'];
		$ville = $salle['ville'];
		$adresse = $salle['adresse'];
		$cp = $salle['cp'];
		$capacite = $salle['capacite'];
		$categorie = $salle['categorie'];
	}
?>
	<div class="form-group">
		<label for="disabledSelect">Titre salle:</label>
		<input class="form-control" type="text" placeholder="<?php echo $titre;?>" disabled>
		<label for="disabledSelect">Description:</label>
		<textarea class="form-control" rows="3" placeholder="<?php echo $description;?>" disabled></textarea>
		<label for="disabledSelect">Pays:</label>
		<input class="form-control" type="text" placeholder="<?php echo $pays;?>" disabled>
		<label for="disabledSelect">Ville:</label>
		<input class="form-control" type="text" placeholder="<?php echo $ville;?>" disabled>
		<label for="disabledSelect">Adresse:</label>
		<input class="form-control" type="text" placeholder="<?php echo $adresse;?>" disabled>
		<label for="disabledSelect">Capacité:</label>
		<input class="form-control" type="text" placeholder="<?php echo $capacite;?>" disabled>
		<label for="disabledSelect">Catégorie:</label>
		<input class="form-control" type="text" placeholder="<?php echo $categorie;?>" disabled>
	</div>
<?php
} 


if(isset($_POST) && $_POST['modal'] == 'edit-salle'){
	$salles = get_salle($_POST['id_salle']);
	foreach($salles as $salle){
		$titre = $salle['titre'];
		$description = $salle['description'];
		$pays = $salle['pays'];
		$ville = $salle['ville'];
		$adresse = $salle['adresse'];
		$cp = $salle['cp'];
		$capacite = $salle['capacite'];
		$categorie = $salle['categorie'];
	}
?>
	<form method="post" id="formajax" role="form" enctype="multipart/form-data">
		<div class="form-group formajax">
			<label for="disabledSelect">Titre salle:</label>
			<input class="form-control" name="titre" type="text" value="<?php echo $titre;?>">
			<label for="disabledSelect">Description:</label>
			<textarea class="form-control"name="description" rows="3" value="<?php echo $description;?>"><?php echo $description;?></textarea>
			<label for="disabledSelect">Pays:</label>
			<input class="form-control" name="pays" type="text" value="<?php echo $pays;?>">
			<label for="disabledSelect">Ville:</label>
			<input class="form-control" name="ville" type="text" value="<?php echo $ville;?>">
			<label for="disabledSelect">Adresse:</label>
			<input class="form-control" name="adresse" type="text" value="<?php echo $adresse;?>">
			<label for="disabledSelect">Code Postal:</label>
			<input class="form-control" name="cp" type="text" value="<?php echo $cp;?>">
			<label for="disabledSelect">Capacité:</label>
			<input class="form-control" name="capacite" type="text" value="<?php echo $capacite;?>">
			<label for="disabledSelect">Catégorie:</label>
			<select class="form-control" name="categorie">
				<option selected="selected"><?php echo $categorie;?></option>
				<option value="reunion">reunion</option>
				<option value="mariage">Mariage</option>
				<option value="bureau">Bureau</option>
				<option value="formation">Formation</option>
			</select>
		</div>
		<button type="submit" id="test" class="btn btn-default" name="edition">Enregistrer</button>
	</form>
<?php
}


if(isset($_POST) && $_POST['modal'] == 'see-produit'){
//GESTION PRODUITS
$produits = get_produit($_POST['id_produit']);
foreach($produits as $produit){
		$id_salle = $produit['id_salle'];
		$date_arr = $produit['date_arrivee'];
		$date_dep = $produit['date_depart'];
		$prix = $produit['prix'];
		$etat = $produit['etat'];
	}
?>
	<div class="form-group">
		<label for="disabledSelect">Id salle:</label>
		<input class="form-control" type="text" placeholder="<?php echo $id_salle;?>" disabled>
		<label for="disabledSelect">Date arrivée:</label>
		<input class="form-control" type="text" placeholder="<?php echo $date_arr;?>" disabled>
		<label for="disabledSelect">Date de départ:</label>
		<input class="form-control" type="text" placeholder="<?php echo $date_dep;?>" disabled>
		<label for="disabledSelect">Prix:</label>
		<input class="form-control" type="text" placeholder="<?php echo $prix;?>" disabled>
		<label for="disabledSelect">Etat:</label>
		<input class="form-control" type="text" placeholder="<?php echo $etat;?>" disabled>
	</div>

<?php	
}



if(isset($_POST) && $_POST['modal'] == 'edit-produit'){
//GESTION PRODUITS
$produits = get_produit($_POST['id_produit']);
foreach($produits as $produit){
		$id_salle = $produit['id_salle'];
		$date_arr = $produit['date_arrivee'];
		$date_dep = $produit['date_depart'];
		$prix = $produit['prix'];
		$etat = $produit['etat'];
	}
?>

<form method="post" id="formajax" role="form" enctype="multipart/form-data">
	<div class="form-group formajax">
		<label for="disabledSelect">Id salle:</label>
		<input class="form-control" name="id_salle" type="text" value="<?php echo $id_salle;?>">
		<label for="disabledSelect">Date arrivée:</label>
		<input class="form-control" name="date_arrivee" type="text" value="<?php echo $date_arr;?>">
		<label for="disabledSelect">Date de départ:</label>
		<input class="form-control" name="date_depart" type="text" value="<?php echo $date_dep;?>">
		<label for="disabledSelect">Prix:</label>
		<input class="form-control" name="prix" type="text" value="<?php echo $prix;?>">
		<label for="disabledSelect">Etat:</label>
		<select class="form-control" name="etat">
				<option selected="selected"><?php echo $etat;?></option>
				<?php if($etat == 'libre'){?>
					<option value="reservation">R&eacute;servation</option>
				<?php } else {?>
				<option value="libre">Libre</option>
				<?php } ?>
			</select>
	</div>
	<button type="submit" id="test" class="btn btn-default" name="edition">Enregistrer</button>
</form>
	
<?php	
}


if(isset($_POST) && $_POST['modal'] == 'see-membre'){
//GESTION MEMBRE
$membres = get_membre($_POST['id_membre']);
foreach($membres as $membre){
		$id_membre = $membre['id_membre'];
		$pseudo = $membre['pseudo'];
		$nom = $membre['nom'];
		$prenom = $membre['prenom'];
		$email = $membre['email'];
		$civilite = $membre['civilite'];
		$statut = $membre['statut'];
		$date_enregistrement = $membre['date_enregistrement'];
	}
	?>
	<div class="form-group">
		<label for="disabledSelect">Id membre:</label>
		<input class="form-control" type="text" placeholder="<?php echo $id_membre;?>" disabled>
		<label for="disabledSelect">Pseudo:</label>
		<input class="form-control" type="text" placeholder="<?php echo $pseudo;?>" disabled>
		<label for="disabledSelect">Nom:</label>
		<input class="form-control" type="text" placeholder="<?php echo $nom;?>" disabled>
		<label for="disabledSelect">Prenom:</label>
		<input class="form-control" type="text" placeholder="<?php echo $prenom;?>" disabled>
		<label for="disabledSelect">Email:</label>
		<input class="form-control" type="text" placeholder="<?php echo $email;?>" disabled>
		<label for="disabledSelect">Civilité:</label>
		<input class="form-control" type="text" placeholder="<?php if($civilite == 'f'){ echo 'Femme';}elseif($civilite == 'm'){ echo 'Homme';}?>" disabled>
		<label for="disabledSelect">Date d'enregistrement:</label>
		<input class="form-control" type="text" placeholder="<?php echo $date_enregistrement;?>" disabled>
		<label for="disabledSelect">Satut:</label>
		<input class="form-control" type="text" placeholder="<?php if($statut == '1'){ echo 'Admin';}elseif($statut == '2'){ echo 'Membre';}?>" disabled>
	</div>
<?php
}


if(isset($_POST) && $_POST['modal'] == 'edit-membre'){
//GESTION MEMBRE
$membres = get_membre($_POST['id_membre']);
foreach($membres as $membre){
		$id_membre = $membre['id_membre'];
		$pseudo = $membre['pseudo'];
		$nom = $membre['nom'];
		$prenom = $membre['prenom'];
		$email = $membre['email'];
		$civilite = $membre['civilite'];
		$statut = $membre['statut'];
		$date_enregistrement = $membre['date_enregistrement'];
	}
	?>
<form method="post" id="formajax" role="form" enctype="multipart/form-data">
	<div class="form-group">
		<label for="disabledSelect">Id membre:</label>
		<input class="form-control" name="id_membre" type="text" value="<?php echo $id_membre;?>">
		<label for="disabledSelect">Pseudo:</label>
		<input class="form-control" name="pseudo" type="text" value="<?php echo $pseudo;?>">
		<label for="disabledSelect">Nom:</label>
		<input class="form-control" name="nom" type="text" value="<?php echo $nom;?>">
		<label for="disabledSelect">Prenom:</label>
		<input class="form-control" name="prenom" type="text" value="<?php echo $prenom;?>">
		<label for="disabledSelect">Email:</label>
		<input class="form-control" name="email" type="text" value="<?php echo $email;?>">
		<label for="disabledSelect">Civilité:</label>
		<select class="form-control" name="civilite">
				<option selected="selected"><?php if($civilite =='f'){ echo 'Femme';}else{ echo 'Homme';}?></option>
				<?php if($civilite == 'f'){?>
					<option value="m">Homme</option>
				<?php } else {?>
				<option value="f">Femme</option>
				<?php } ?>
		</select>
		<label for="disabledSelect">Date d'enregistrement:</label>
		<input class="form-control" name="date_enregistrement" type="text" value="<?php echo $date_enregistrement;?>">
		<label for="disabledSelect">Satut:</label>
		<select class="form-control" name="statut">
				<option selected="selected"><?php echo $statut;?></option>
				<?php if($statut == '1'){?>
					<option value="2">2</option>
				<?php } else {?>
				<option value="1">1</option>
				<?php } ?>
		</select>
	</div>
	<button type="submit" id="test" class="btn btn-default" name="edition">Enregistrer</button>
</form>
<?php
}

if(isset($_POST) && $_POST['modal'] == 'see-avis'){
//GESTION AVIS
$avis = get_avisModal($_POST['id_avis']);
foreach($avis as $avisM){
		$id_avis = $avisM['id_avis'];
		$membre = $avisM['id_membre'];
		$id_salle = $avisM['id_salle'];
		$commentaire = $avisM['commentaire'];
		$note = $avisM['note'];
		$date = $avisM['date_enregistrement'];
	}
	 ?>

	<div class="form-group">
		<label for="disabledSelect">Id avis:</label>
		<input class="form-control" type="text" placeholder="<?php echo $id_avis;?>" disabled>
		<label for="disabledSelect">Membre:</label>
		<input class="form-control" type="text" placeholder="<?php echo $membre;?>" disabled>
		<label for="disabledSelect">Id salle:</label>
		<input class="form-control" type="text" placeholder="<?php echo $id_salle;?>" disabled>
		<label for="disabledSelect">Commentaire:</label>
		<textarea class="form-control" rows="3" placeholder="<?php echo $commentaire;?>" disabled></textarea>
		<label for="disabledSelect">Note:</label>
		<input class="form-control" type="text" placeholder="<?php echo $note;?>" disabled>
		<label for="disabledSelect">Date d'enregistrement:</label>
		<input class="form-control" type="text" placeholder="<?php echo $date;?>" disabled>
	</div>
<?php	
}

if(isset($_POST) && $_POST['modal'] == 'edit-avis'){
//GESTION AVIS
$avis = get_avisModal($_POST['id_avis']);
foreach($avis as $avisM){
		$id_avis = $avisM['id_avis'];
		$membre = $avisM['id_membre'];
		$id_salle = $avisM['id_salle'];
		$commentaire = $avisM['commentaire'];
		$note = $avisM['note'];
		$date = $avisM['date_enregistrement'];
	}
	 ?>
<form method="post" id="formajax" role="form" enctype="multipart/form-data">
	<div class="form-group">
		<label for="disabledSelect">Id avis:</label>
		<input class="form-control" name="id_avis" type="text" value="<?php echo $id_avis;?>">
		<label for="disabledSelect">Id membre:</label>
		<input class="form-control" name="id_membre" type="text" value="<?php echo $membre;?>">
		<label for="disabledSelect">Id salle:</label>
		<input class="form-control" name="id_salle" type="text" value="<?php echo $id_salle;?>">
		<label for="disabledSelect">Commentaire:</label>
		<textarea class="form-control" rows="3" name="commentaire" value="<?php echo $commentaire;?>"><?php echo $commentaire;?></textarea>
		<label for="disabledSelect">Note:</label>
		<input class="form-control" name="note" type="text" value="<?php echo $note;?>">
		<label for="disabledSelect">Date d'enregistrement:</label>
		<input class="form-control" name="date_enregistrement" type="text" value="<?php echo $date;?>">
	</div>
	<button type="submit" id="test" class="btn btn-default" name="edition">Enregistrer</button>
</form>
<?php	
}


if(isset($_POST) && $_POST['modal'] == 'see-commande'){
//GESTION COMMANDES
//$id = $_POST['id_commande'];
$commandes_modal = get_commandeModal($_POST['id_commande']);
foreach($commandes_modal as $commande){
		$id_commande = $commande['id_commande'];
		$membre = $commande['id_membre'];
		$id_produit = $commande['id_produit'];
		$date = $commande['date_enregistrement'];
	}
?>
	<div class="form-group">
		<label for="disabledSelect">Id Commande:</label>
		<input class="form-control" type="text" placeholder="<?php echo $id_commande;?>" disabled>
		<label for="disabledSelect">Membre:</label>
		<input class="form-control" type="text" placeholder="<?php echo $membre;?>" disabled>
		<label for="disabledSelect">Id produit:</label>
		<input class="form-control" type="text" placeholder="<?php echo $id_produit;?>" disabled>
		<label for="disabledSelect">Date d'enregistrement:</label>
		<input class="form-control" type="text" placeholder="<?php echo $date;?>" disabled>
	</div>

<?php	
}
?>