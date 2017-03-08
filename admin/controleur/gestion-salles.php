<?php
include_once('modele/set_salles.php');
include_once('modele/get_salles.php');


// --------------------------------------------------------------------------------------------------
// fonction de REDIMENSIONNEMENT physique "proportionnel" et ENREGISTREMENT
// --------------------------------------------------------------------------------------------------
// retourne : 1 (vrai) si le redimensionnement et l enregistrement ont bien eu lieu, sinon rien (false)
// --------------------------------------------------------------------------------------------------
// La FONCTION : fct_redim_image($Wmax, $Hmax, $rep_Dst, $img_Dst, $rep_Src, $img_Src)
// Les param�tres :
// - $Wmax : LARGEUR maxi finale ----> ou 0 : largeur libre
// - $Hmax : HAUTEUR maxi finale ----> ou 0 : hauteur libre
// - $rep_Dst : r�pertoire de l image de Destination (d�prot�g�) ----> ou '' : m�me r�pertoire
// il faut s'assurer que les droits en �criture ont �t� donn�s au dossier (chmod ou via logiciel FTP)
// - $img_Dst : NOM de l image de Destination ----> ou '' : m�me nom que l image Src
// - $rep_Src : r�pertoire de l image Source (d�prot�g�)
// - $img_Src : NOM de l image Source
// --------------------------------------------------------------------------------------------------
// si $rep_Dst = ''   : $rep_Dst=$rep_Src (m�me r�pertoire)
// si $img_Dst = '' : $img_Dst=$img_Src (m�me nom)
// Attention : si $rep_Dst='' ET $img_Dst='' : on �crase (remplace) l image source ($img_Src) !
// NB : $img_Dst et $img_Src doivent avoir la m�me extension (m�me type mime) !
// --------------------------------------------------------------------------------------------------
// 3 options :
// A- $Wmax != 0 et $Hmax != 0 : a LARGEUR maxi ET HAUTEUR maxi fixes
// B- si $Wmax = 0 : image finale a LARGEUR maxi fixe (hauteur libre)
// C- si $Hmax = 0 : image finale a HAUTEUR maxi fixe (largeur libre)
// --------------------------------------------------------------------------------------------------
// Extensions acceptees (traitees ici) : .jpg , .jpeg , .png
// Pour ajouter d autres extensions : voir la biblioth�que GD ou ImageMagick
// (GD) NE FONCTIONNE PAS avec les GIF ANIMES ou a fond transparent !
// --------------------------------------------------------------------------------------------------
// UTILISATION (exemple) :
// $redimOK = fct_redim_image(120,80,'reppicto/','monpicto.jpg','repimage/','monimage.jpg');
// if ($redimOK == 1) { echo 'Redimensionnement OK !';  }
// --------------------------------------------------------------------------------------------------
function fct_redim_image($Wmax, $Hmax, $rep_Dst, $img_Dst, $rep_Src, $img_Src) {
  // ------------------------------------------------------------------
 $condition = 0;
  // Si certains param�tres ont pour valeur '' :
   if ($rep_Dst == '') { $rep_Dst = $rep_Src; }  // (meme repertoire)
   if ($img_Dst == '') { $img_Dst = $img_Src; }  // (meme nom)
   if ($Wmax == '') { $Wmax = 0; }
   if ($Hmax == '') { $Hmax = 0; }
  // ------------------------------------------------------------------
  // si le fichier existe dans le r�pertoire, on continue...
 if (file_exists($rep_Src.$img_Src) && ($Wmax!=0 || $Hmax!=0)) { 
    // ----------------------------------------------------------------
    // extensions accept�es : 
   $ExtfichierOK = '" jpg jpeg png"';  // (l espace avant jpg est important)
    // extension
   $tabimage = explode('.',$img_Src);
   $extension = $tabimage[sizeof($tabimage)-1];  // dernier element
   $extension = strtolower($extension);  // on met en minuscule
    // ----------------------------------------------------------------
    // extension OK ? on continue ...
   if (strpos($ExtfichierOK,$extension) != '') {
       // -------------------------------------------------------------
       // r�cup�ration des dimensions de l image Src
      $size = getimagesize($rep_Src.$img_Src);
      $W_Src = $size[0];  // largeur
      $H_Src = $size[1];  // hauteur
       // -------------------------------------------------------------
       // condition de redimensionnement et dimensions de l image finale
       // -------------------------------------------------------------
       // A- LARGEUR ET HAUTEUR maxi fixes
      if ($Wmax != 0 && $Hmax != 0) {
         $ratiox = $W_Src / $Wmax;  // ratio en largeur
         $ratioy = $H_Src / $Hmax;  // ratio en hauteur
         $ratio = max($ratiox,$ratioy);  // le plus grand
         $W = $W_Src/$ratio;
         $H = $H_Src/$ratio;   
         $condition = ($W_Src>$W) || ($W_Src>$H);  // 1 si vrai (true)
      }
       // -------------------------------------------------------------
       // B- LARGEUR maxi fixe
      if ($Hmax != 0 && $Wmax == 0) {
         $H = $Hmax;
         $W = $H * ($W_Src / $H_Src);
         $condition = $H_Src > $Hmax;  // 1 si vrai (true)
      }
       // -------------------------------------------------------------
       // C- HAUTEUR maxi fixe
      if ($Wmax != 0 && $Hmax == 0) {
         $W = $Wmax;
         $H = $W * ($H_Src / $W_Src);         
         $condition = $W_Src > $Wmax;  // 1 si vrai (true)
      }
       // -------------------------------------------------------------
       // on REDIMENSIONNE si la condition est vraie
       // -------------------------------------------------------------
      if ($condition == 1) {
          // cr�ation de la ressource-image"Src" en fonction de l extension
          // et on cr�e une ressource-image"Dst" vide aux dimensions finales
         switch($extension) {
         case 'jpg':
         case 'jpeg':
           $Ress_Src = imagecreatefromjpeg($rep_Src.$img_Src);
           $Ress_Dst = ImageCreateTrueColor($W,$H);
           break;
         case 'png':
           $Ress_Src = imagecreatefrompng($rep_Src.$img_Src);
           $Ress_Dst = ImageCreateTrueColor($W,$H);
            // fond transparent (pour les png avec transparence)
           imagesavealpha($Ress_Dst, true);
           $trans_color = imagecolorallocatealpha($Ress_Dst, 0, 0, 0, 127);
           imagefill($Ress_Dst, 0, 0, $trans_color);
           break;
         }
          // ----------------------------------------------------------
          // REDIMENSIONNEMENT (copie, redimensionne, r�-echantillonne)
         ImageCopyResampled($Ress_Dst, $Ress_Src, 0, 0, 0, 0, $W, $H, $W_Src, $H_Src); 
          // ----------------------------------------------------------
          // ENREGISTREMENT dans le r�pertoire (avec la fonction appropri�e)
         switch ($extension) { 
         case 'jpg':
         case 'jpeg':
           ImageJpeg ($Ress_Dst, $rep_Dst.$img_Dst);
           break;
         case 'png':
           imagepng ($Ress_Dst, $rep_Dst.$img_Dst);
           break;
         }
          // ----------------------------------------------------------
          // lib�ration des ressources-image
         imagedestroy ($Ress_Src);
         imagedestroy ($Ress_Dst);
      }
       // -------------------------------------------------------------
   }
 }
// --------------------------------------------------------------------------------------------------
  // retourne : 1 (vrai) si le redimensionnement et l enregistrement ont bien eu lieu, sinon rien (false)
  // si le fichier a bien �t� cr��
 if ($condition == 1 && file_exists($rep_Dst.$img_Dst)) { return true; }
 else { return false; }
}
// --------------------------------------------------------------------------------------------------






if(isset($_POST['bouton']))
{
	if($_POST['titre'] !='' && $_POST['description'] !='' && $_POST['adresse'] !='' && $_POST['cp'] !=''){
		
		$tmp_name = $_FILES["photo"]["tmp_name"];
		$name = $_FILES["photo"]["name"];
		$name = sha1(session_id().microtime()).'.jpg';

		set_salles(addslashes($_POST['titre']), addslashes($_POST['description']), $name, $_POST['pays'], $_POST['ville'], addslashes($_POST['adresse']), 
					$_POST['cp'], $_POST['capacite'], $_POST['categorie']);
					

		$uploads_dir = '../site/img/';
		
		$move = move_uploaded_file($tmp_name, "$uploads_dir/$name");
		
		$redimOK = fct_redim_image(800, 300, $uploads_dir, $name, $uploads_dir, $name);
		//$redimOK = fct_redim_image(120,80,'reppicto/','monpicto.jpg','repimage/','monimage.jpg');
		if ($redimOK == 1) { echo 'Redimensionnement OK !';  } else { echo 'Redimensionnement FALSE !';}

	} else {
		$remplir = '<p style="color:red">merci de remplir tous les champs</p>';
	}

}
if(isset($_GET['ordre']) && isset($_GET['tri'])){
	$ordre = $_GET['ordre'];
	$tri = $_GET['tri'];
} else{
	$ordre = 'DESC';
	$tri = 'id_salle';
}
echo $ordre;
$salles = get_salles($tri, $ordre);
foreach($salles as $cle => $salle)
{
    $salles[$cle]['titre'] = htmlspecialchars($salle['titre']);
    $salles[$cle]['description'] = nl2br(htmlspecialchars($salle['description']));
}




// On affiche les page (vues)
include_once('vue/include/header.php');
include_once('vue/include/navbar.php');
include_once('vue/gestion-salles.php');
include_once('vue/include/footer.php');
