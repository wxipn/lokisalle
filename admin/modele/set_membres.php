<?php
function set_membres($pseudo, $mdp, $nom, $prenom, $email, $civilite, $statut, $date_enregistrement)
{
    global $bdd;

    $req = $bdd->prepare("INSERT INTO membre (`pseudo`, `mdp`, `nom`, `prenom`, `email`, `civilite`, `statut`, `date_enregistrement`) 
							VALUES (:pseudo, :mdp, :nom, :prenom, :email, :civilite, :statut, :date_enregistrement)");

    $req->execute(array(
            'pseudo' => $pseudo,
            'mdp' => $mdp,
            'nom' => $nom,
			'prenom' => $prenom,
			'email' => $email,
			'civilite' => $civilite,
			'statut' => $statut,
			'date_enregistrement' => $date_enregistrement,
            ));

	return $req;
}