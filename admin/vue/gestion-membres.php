        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Gestion des membres
                            <small>Edition, supression, recherche, visualisation</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Index</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Gestion membres
                            </li>
                        </ol>
                    </div>
					
					<div class="col-lg-12">
                        <h2>Gestion des salles</h2>
                        <div class="table-responsive recharge">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Id_membre</th>
                                        <th>Pseudo</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
										<th>Email</th>
										<th>Civilite</th>
										<th>Statut</th>
										<th>Date d'enregistrement</th>
										<th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
								foreach($membres as $membre)
								{ ?>
                                    <tr> <!-- ID MEMBRES -->
                                        <td><?php echo $membre['id_membre'];?></td>
                                        <td><?php echo $membre['pseudo'];?></td>
										<td><?php echo $membre['nom'];?></td>
										<td><?php echo $membre['prenom'];?></td>
										<td><?php echo $membre['email'];?></td>
										<?php if($membre['civilite'] == 'f'){ echo '<td>Femme</td>';}elseif($membre['civilite'] == 'm'){ echo '<td>Homme</td>';}?>
										<?php if($membre['statut'] == '1'){ echo '<td>Admin</td>';}elseif($membre['statut'] == '2'){ echo '<td>Membre</td>';}?>
										<?php $membre['date_enregistrement'] = date('d-m-Y H:m:s'); ?>
										<td><?php echo $membre['date_enregistrement'];?></td>
										<td><a href="#myModal" data-toggle="modal" id="<?php echo $membre['id_membre'];?>" data-target="#see-modal" title="Voir les informations du membre <?php echo $membre['pseudo'];?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a> &nbsp;  
											<a href="#myModal" data-toggle="modal" id="<?php echo $membre['id_membre'];?>" data-target="#edit-modal" title="Editer les informations du membre <?php echo $membre['pseudo'];?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> &nbsp;  
											<a href="#myModal" data-toggle="modal" id="<?php echo $membre['id_membre'];?>" data-target="#delete-modal" title="Supprimer les informations du membre <?php $membre['pseudo'];?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
                                    </tr>
								<?php 
								}
								?>
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- /.tableau -->

<?php
if(isset($remplir)){
 echo $remplir;
 }
?>
					<form method="post" role="form" id="gestion_produits">
						<div class="container">
							<div class="col-lg-6">
							<label>Pseudo</label>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input type="text" class="form-control" placeholder="pseudo" name="pseudo">
								</div>
								<label>Mot de passe</label>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
									<input type="text" class="form-control" placeholder="mdp" name="mdp">
								</div>
								<label>Nom</label>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
									<input type="text" class="form-control" placeholder="nom" name="nom">
								</div>
								<label>Prénom</label>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
									<input type="text" class="form-control" placeholder="prenom" name="prenom">
								</div>
							</div>
							<div class="col-lg-6">
								<label>Email</label>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
									<input type="text" class="form-control" placeholder="email" name="email">
								</div>
								<div class="form-group">
									<label>Civilité</label>
									<select class="form-control" name="civilite">
										<option value="m">Homme</option>
										<option value="f">Femme</option>
									</select>
								</div>
								<div class="form-group">
									<label>Statut</label>
									<select class="form-control" name="statut">
										<option value="1">Admin</option>
										<option value="2">User</option>
									</select>
								</div>
								
								<button type="submit" class="btn btn-default" name="bouton">Enregistrer</button>
							</div>
						</div>
					</form>
				</div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
	<!-- MODAL-SEE -->	
    <div id="see-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Information de la salle</h4>
                </div>
                <div class="modal-body edit-content">
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">FERMER</button>
                </div>
            </div>
        </div>
    </div>
	<!-- /MODAL-SEE -->
	
	<!-- MODAL-EDIT -->	
    <div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Information d'édition salle</h4>
                </div>
                <div class="modal-body edit-content">
                   
                </div>
                <div class="modal-footer">
                    <button type="button" id="edit" class="btn btn-default" data-dismiss="modal">Close</button>
                    
                </div>
            </div>
        </div>
    </div>
	<!-- /MODAL-EDIT -->
	
	<!-- MODAL-DELETE -->	
    <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" id="close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Information de suppression salle</h4>
                </div>
                <div class="modal-body edit-content">
                   
                </div>
                <div class="modal-footer">
                    <button type="button" id="refresh" class="btn btn-default" data-dismiss="modal">Close</button>
                    
                </div>
            </div>
        </div>
    </div>
	<!-- /MODAL-DELETE -->

<script>

$( document ).ready(function() {
    $('#see-modal').on('show.bs.modal', function(e) {  
	var $modal = $(this),
	Id = e.relatedTarget.id;
	  $.ajax({
		  method: 'POST',
		  url: 'controleur/modal.php',
		  data: {id_membre:+Id, modal:'see-membre'},
		   success: function(data)
		  
			{
				$modal.find('.edit-content').html(data);
			}
	  });    
    });
	
	$('#edit-modal').on('show.bs.modal', function(e) {  
	var $modal = $(this),
	Id = e.relatedTarget.id;
	  $.ajax({
		  method: 'POST',
		  url: 'controleur/modal.php',
		  data: {id_membre:+Id, modal:'edit-membre'},
		   success: function(data)
		  
			{
				$modal.find('.edit-content').html(data);
				$('#test').click(function(e){
					e.preventDefault();
					var form = $("#formajax").serializeArray();
					$.ajax({			
					type: "post",
					url:"controleur/modal_update_membre.php",
					data:{id_membre:Id, formulaire:form},
					success:function(data){
						$modal.find('.edit-content').html(data);
						$("#edit").click(function () {
							$(".recharge").load(location.href + " .recharge");
						});
					}
					});
				});
				
				
			}
	  });    
    });
	
	$('#delete-modal').on('show.bs.modal', function(e) {  
	var $modal = $(this),
	Id = e.relatedTarget.id;
	  $.ajax({
		  method: 'POST',
		  url: 'controleur/modal_del.php',
		  data: {id_membre:+Id, modal:'delete-membre'},
		   success: function(data)
		  
			{
				$modal.find('.edit-content').html('L\'ID'+Id+' est supprimé');
			}
	  });    
    });
	
	$('#refresh').on('click', function() {
		location.reload();
	});
	$('#close').on('click', function() {
		location.reload();
	});
});

</script>