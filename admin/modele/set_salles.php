<?php
function set_salles($titre, $description, $photo, $pays, $ville, $adresse, $cp, $capacite, $categorie)
{
    global $bdd;

    $req = $bdd->prepare("INSERT INTO salle (`titre`, `description`, `photo`, `pays`, `ville`, `adresse`, `cp`, `capacite`, `categorie`) 
							VALUES (:titre, :description, :photo, :pays, :ville, :adresse, :cp, :capacite, :categorie)");
    $req->execute(array(
            'titre' => $titre,
            'description' => $description,
            'photo' => $photo,
			'pays' => $pays,
			'ville' => $ville,
			'adresse' => $adresse,
			'cp' => $cp,
			'capacite' => $capacite,
			'categorie' => $categorie,
            ));

	return $req;
}