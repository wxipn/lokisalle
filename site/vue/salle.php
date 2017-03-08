	<!-- Page Content -->
    <div class="container">

        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
			<?php foreach($salle as $info){?>
                <h1 class="page-header"><?php echo ucfirst($info['categorie']).' '.$info['titre'];?>
                    <small><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
							<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
							<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
							<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
							<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                <img class="img-responsive" src="img/<?php echo $info['photo'];?>" alt="" width="500px" />
            </div>

            <div class="col-md-4">
				<?php if(!isset($_SESSION['membre']) || $_SESSION['membre'] == false){?>
					<div class="alert alert-info pull-right">
					  <i class="glyphicon glyphicon-info-sign"></i>
					  <strong><a href="" data-toggle="modal" data-target="#connexion">Se connecter</a> ou <a href="" data-toggle="modal" data-target="#inscription">s'inscrire</a></strong> pour réserver.
					</div>
					
					<!-- Modal Connexion-->
					<div class="modal fade" id="connexion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<!-- Modal Header -->
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">
										   <span aria-hidden="true">&times;</span>
										   <span class="sr-only">Close</span>
									</button>
									<h4 class="modal-title" id="myModalLabel">
										Se connecter
									</h4>
								</div>
								<!-- Modal Body -->
								<div class="modal-body">
									<form role="form" method="POST" onsubmit="return verifForm(this)">
									  <div class="form-group">
										<label for="pseudo">Pseudo:</label>
										  <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo" onblur="verifPseudo(this)"/>
									  </div>
									  <div class="form-group">
										<label for="password">Mot de passe:</label>
										  <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" onblur="verifMdp(this)" />
									  </div>
									  <button type="submit" class="btn btn-default">Connexion</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<script>
					function surligne(champ, erreur)
					{
					   if(erreur)
						  champ.style.backgroundColor = "#fba";
					   else
						  champ.style.backgroundColor = "";
					}
					
					function verifPseudo(champ)
					{
					   if(champ.value.length < 1 || champ.value.length > 99)
					   {
						  surligne(champ, true);
						  return false;
					   }
					   else
					   {
						  surligne(champ, false);
						  return true;
					   }
					}
					
					function verifMdp(champ)
					{
					   if(champ.value.length < 2 || champ.value.length > 25)
					   {
						  surligne(champ, true);
						  return false;
					   }
					   else
					   {
						  surligne(champ, false);
						  return true;
					   }
					}
					
					function verifForm(f)
					{
					   var pseudoOk = verifPseudo(f.pseudo);
					   var mdpOk = verifMdp(f.password);
					   if(pseudoOk && mdpOk)
						  return true;
					   else
					   {
						  alert("Veuillez remplir correctement tous les champs");
						  return false;
					   }
					}
					</script>
					<!-- Modal Inscription-->
					<div class="modal fade" id="inscription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<!-- Modal Header -->
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">
										   <span aria-hidden="true">&times;</span>
										   <span class="sr-only">Close</span>
									</button>
									<h4 class="modal-title" id="myModalLabel">
										S'inscrire sur Lokisalle
									</h4>
								</div>
								<!-- Modal Body -->
								<div class="modal-body">
									<form role="form" action="index.php?section=inscription" method="POST" onsubmit="return verifFormI(this)">
									  <div class="form-group">
										<label for="pseudo">Choisir un pseudo :</label>
										  <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo" onblur="verifPseudo(this)"/>
									  </div>
									  <div class="form-group">
										<label for="nom">nom :</label>
										  <input type="text" class="form-control" id="nom" name="nom" placeholder="Votre nom"/>
									  </div>
									  <div class="form-group">
										<label for="prenom">prénom :</label>
										  <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Votre prénom"/>
									  </div>
									  <div class="form-group">
										<label>Civilité :</label>
										  <select class="form-control" name="civilite">
											<option value="f">Femme</option>
											<option value="m">Homme</option>
										  </select>
									  </div>
									  <div class="form-group">
										<label for="exampleInputEmail1">Adresse email :</label>
										  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" onblur="verifMail(this)"/>
									  </div>
									  <div class="form-group">
										<label for="password">Mot de passe :</label>
										  <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe"/>
									  </div>
									  <button type="submit" class="btn btn-default">s'enregistrer</button>
									</form>
								</div>
							</div>
						</div>
					</div>
										<script>
					function surligne(champ, erreur)
					{
					   if(erreur)
						  champ.style.backgroundColor = "#fba";
					   else
						  champ.style.backgroundColor = "";
					}
					
					function verifPseudo(champ)
					{
					   if(champ.value.length < 1 || champ.value.length > 99)
					   {
						  surligne(champ, true);
						  return false;
					   }
					   else
					   {
						  surligne(champ, false);
						  return true;
					   }
					}
					
					function verifMdp(champ)
					{
					   if(champ.value.length < 2 || champ.value.length > 25)
					   {
						  surligne(champ, true);
						  return false;
					   }
					   else
					   {
						  surligne(champ, false);
						  return true;
					   }
					}
					
					function verifMail(champ)
					{
					   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
					   if(!regex.test(champ.value))
					   {
						  surligne(champ, true);
						  return false;
					   }
					   else
					   {
						  surligne(champ, false);
						  return true;
					   }
					}
					
					function verifFormI(f)
					{
					   var pseudoOk = verifPseudo(f.pseudo);
					   var mdpOk = verifMdp(f.password);
					   var mailOk = verifMail(f.email);
					   if(pseudoOk && mdpOk && mailOk)
						  return true;
					   else
					   {
						  alert("Veuillez remplir correctement tous les champs");
						  return false;
					   }
					}
					</script>
					
				<?php }else{?>
					<a href="#myModal" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModalReserve">Réserver</a>
					<!-- Modal -->
					  <div class="modal fade" id="myModalReserve" role="dialog">
						<div class="modal-dialog">
						<?php $membre = $_SESSION['membre']['id_membre'];?>
						  <!-- Modal content-->
						  <div class="modal-content">
							<div class="modal-header">
							  <button type="button" class="close" data-dismiss="modal">&times;</button>
							  <h4 class="modal-title">Réserver la salle <?php echo $info['titre'];?></h4>
							</div>
							<form action="index.php?section=profil" method="POST">
							<input type="hidden" value="<?php  echo $info['id_produit']?>" name="produit">
							<input type="hidden" value="<?php  echo $info['id_salle']?>" name="salle">
							<div class="modal-body  edit-content">
							  
							</div>
							<div class="modal-footer">
							  <button type="submit" class="btn btn-default">Valider ma réservation</button>
							</div>
							</form>
						  </div>
						</div>
					  </div>
				<?php }?>
                <h3>Description</h3>
                <p><?php echo $info['description'];?></p>
                <h3>Détails</h3>
                <ul class="well">
                    <li><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Capacité: <?php echo $info['capacite'];?> personnes</li>
                    <li><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Catégorie : <?php echo $info['categorie'];?></li>
					<li><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Adresse : <?php echo $info['adresse'];?>, <?php echo $info['cp'];?> <?php echo $info['ville'];?></li>
					<li><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Date :<?php echo $info['date_arrivee_fr'];?> au <?php echo $info['date_depart_fr'];?></li>
                    <li><span class="glyphicon glyphicon-eur" aria-hidden="true"></span> Tarif : <?php echo $info['prix'];?> €</li>
                </ul>
				<?php if(isset($_SESSION['membre']) && $_SESSION['membre'] == true){?>
				<span class="label label-info pull-right"><a href="" data-toggle="modal" data-target="#myModalCom">Déposer un commentaire et une note</a> sur cette salle</span>
				<!-- Modal -->
					  <div class="modal fade" id="myModalCom" role="dialog">
						<div class="modal-dialog">
						
						  <!-- Modal content-->
						  <div class="modal-content">
							<div class="modal-header">
							  <button type="button" class="close" data-dismiss="modal">&times;</button>
							  <h4 class="modal-title">Laisser un commentaire <?php echo $_SESSION['membre']['pseudo'];?> sur la salle <?php echo $info['titre'];?></h4>
							</div>
							<form method="POST">
							<div class="modal-body">
							  <div class="form-group">
								<label for="message">Message :</label>
								<textarea class="form-control" id="message" name="message"></textarea>
							  </div>
							<script>
							var outgoingLink;
							function clic(outgoingLink){
							   document.getElementById('rating').innerHTML = "Votre vote :"+outgoingLink+" ";
							   document.getElementById("hidden").value = outgoingLink;
							}
							</script>
							  <div class="rating" id="rating"><!--
							   --><a href="#5" id="5" onclick="clic(this.id);" title="Donner 5 étoiles">☆</a><!--
							   --><a href="#4" id="4" onclick="clic(this.id);" title="Donner 4 étoiles">☆</a><!--
							   --><a href="#3" id="3" onclick="clic(this.id);" title="Donner 3 étoiles">☆</a><!--
							   --><a href="#2" id="2" onclick="clic(this.id);" title="Donner 2 étoiles">☆</a><!--
							   --><a href="#1" id="1" onclick="clic(this.id);" title="Donner 1 étoile">☆</a>
							  </div>
							  <input type="hidden" id="hidden" name="hidden" value="">
							</div>
							<div class="modal-footer">
							  <button type="submit" class="btn btn-default">Valider mon commentaire</button>
							</div>
							</form>
						  </div>
						</div>
					  </div>
				<?php }?>
            </div>

        </div>
		<hr>
        <!-- /.row -->

		<?php if(isset($_POST['message']) && $retour !=''){ ?>
		<div class="row">
            <div class="col-md-12">
				<div class="alert alert-danger alert-dismissible fade in" role="alert">
				  <i class="glyphicon glyphicon-remove"></i>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong><?php echo $retour;?></strong>
				</div>
			</div>
		</div>
		<?php }
			foreach($commentaires as $commentaire){ ?>
		<div class="row">
            <div class="col-md-12">
				<div class="alert alert-success">
				  <i class="glyphicon glyphicon-pencil"></i>
					<?php echo $commentaire['commentaire'];?><p class="pull-right">le <?php echo $commentaire['date_enregistrement_fr'];?> par <b><?php echo $commentaire['pseudo'];?></b></p>
				</div>
			</div>
		</div>
		<?php } 
		if(!$commentaires){ ?>
		<div class="row">
            <div class="col-md-12">
				<div class="alert alert-info">
				  <i class="glyphicon glyphicon-pencil"></i>
					<?php echo $erreur3;?>
				</div>
			</div>
		</div>
		<?php } ?>
        <!-- Related Projects Row -->
        <div class="row">

            <div class="col-lg-12">
                <h3 class="page-header">Nos différentes salles à <?php echo $info['ville'];?></h3>
            </div>
		<?php } ?>
		<?php foreach($ville as $photo){?>
            <div class="col-sm-3 col-xs-6">
                <a href="index.php?section=salle&id=<?php echo $photo['id_salle'];?>&ville=<?php echo $photo['ville'];?>" title="La salle <?php echo $photo['titre'].' à '. $photo['ville'];?>">
                    <img class="img-responsive portfolio-item" src="img/<?php echo $photo['photo'];?>" alt="La salle <?php echo $photo['titre'].' à '. $photo['ville'];?>" />
                </a>
            </div>
		<?php }?>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
<script>
$( document ).ready(function() {	
		$('#myModalReserve').on('show.bs.modal', function(e) {  
	var $modal = $(this),
	Id = e.relatedTarget.id;
	  $.ajax({
		  method: 'POST',
		  url: '',
		  data: {},
		   success: function(data)
		  
			{
				$modal.find('.edit-content').html('<p>Disponible du <b><?php echo $info['date_arrivee_fr'];?> au <?php echo $info['date_depart_fr'];?></b> pour <b><?php echo $info['prix'];?> €</b></p>');
			}
	  });    
    });
});
</script>