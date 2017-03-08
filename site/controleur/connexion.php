<?php
//Inclusion du modele
include_once('modele/connexion.php');

$contenu='';
if(!empty($_POST['pseudo']) || !empty($_POST['password']))
{

		$membre = get_membre();

        if($membre['mdp'] == $_POST['password'])
        {
			
            foreach($membre as $indice => $element)
            {
                if($indice != 'mdp')
                {
                    $_SESSION['membre'][$indice] = $element;
                }
            }
            
        }
        else{
            $contenu .= '<span class="label label-danger pull-right">Identifiants Pseudo / Mot de passe incorrects </span>';
        }
		//$_SESSION['membre']= $membre;
}


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

if($internauteEstconnecte) // Si l'internaute est déja connecté, il n'a rien à faire ici, nous le redigeons vers son profil. 
							//De cette manière nous affichons le formulaire de connexion uniquement si le membre n'est pas connecté
{
	
    
}

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