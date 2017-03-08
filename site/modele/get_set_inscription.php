<?php
function get_membre_exist()
{
	global $bdd;
	
	$req = $bdd->prepare('SELECT * FROM membre WHERE pseudo = :pseudo');
	$req->execute(array(
					'pseudo' => $_POST['pseudo'],
					));
    $membre_exist = $req->fetch();
	
    return $membre_exist;
}

function get_email_exist()
{
	global $bdd;
	
	$req = $bdd->prepare('SELECT * FROM membre WHERE email = :mail');
	$req->execute(array(
					'mail' => $_POST['email'],
					));
    $mail_exist = $req->fetch();
	
    return $mail_exist;
}

function set_membre($pseudo, $mdp, $nom, $prenom, $email, $civilite)
{
    global $bdd;

    $req = $bdd->prepare("INSERT INTO membre (`pseudo`, `mdp`, `nom`, `prenom`, `email`, `civilite`, `statut`, `date_enregistrement`) 
							VALUES (:pseudo, :mdp, :nom, :prenom, :email, :civilite, '2', NOW())");

    $req->execute(array(
            'pseudo' => $pseudo,
            'mdp' => $mdp,
            'nom' => $nom,
			'prenom' => $prenom,
			'email' => $email,
			'civilite' => $civilite,
            ));

	return $req;
}

function getMembre($id_membre){
	global $bdd;
	
	$req = $bdd->prepare('SELECT pseudo, nom, prenom, email, DATE_FORMAT(date_enregistrement, \'%d/%m/%Y\') AS date_enregistrement_fr 
							FROM membre WHERE id_membre = :id_membre');
	$req->execute(array(
					'id_membre' => $id_membre,
					));
    
	$membre = $req->fetch();
	
    return $membre;
}