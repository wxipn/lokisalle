        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Gestion des salles
                            <small>Edition, supression, recherche, visualisation</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Index</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Gestion Salles
                            </li>
                        </ol>
                    </div>
					<div class="col-lg-12">
                        <h2>Gestion des salles</h2>
                        <div class="table-responsive recharge">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Id_salle
										<div class="btn-group">
										<button data-toggle="dropdown" class="btn btn-xs btn-default dropdown-toggle" type="button">Tri <span class="caret"></span></button>
										<ul role="menu" class="dropdown-menu dropdown-menu-default">
											<li><a href="index.php?section=gestion-salles&tri=id_salle&ordre=ASC">Croissant</a></li>
											<li><a href="index.php?section=gestion-salles&tri=id_salle&ordre=DESC">Décroissant</a></li>
										</ul>
										</div>
										</th>
                                        <th>Titre
										<div class="btn-group">
										<button data-toggle="dropdown" class="btn btn-xs btn-default dropdown-toggle" type="button">Tri <span class="caret"></span></button>
										<ul role="menu" class="dropdown-menu dropdown-menu-default">
											<li><a href="index.php?section=gestion-salles&tri=titre&ordre=ASC">Alphabétique</a></li>
											<li><a href="index.php?section=gestion-salles&tri=titre&ordre=DESC">Antialphabétique</a></li>
										</ul>
										</div>
										</th>
                                        <th>Description</th>
                                        <th>Photo</th>
										<th>Pays</th>
										<th>Ville</th>
										<th>Adresse</th>
										<th>Cp</th>
										<th>Capacité</th>
										<th>Catégorie</th>
										<th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
								foreach($salles as $salle)
								{ ?>
                                    <tr> <!-- ID SALLE -->
                                        <td><?php echo $salle['id_salle'];?></td>
                                        <td><?php echo $salle['titre'];?></td>
                                        <td><?php echo $salle['description'];?></td>
										<td><a data-toggle="lightbox" href="../site/img/<?php echo $salle['photo'] ?>"><?php echo '<img src="../site/img/'.$salle['photo'].'" width=120 height:90 />';?></a></td>
										<td><?php echo $salle['pays'];?></td>
										<td><?php echo $salle['ville'];?></td>
										<td><?php echo $salle['adresse'];?></td>
										<td><?php echo $salle['cp'];?></td>
										<td><?php echo $salle['capacite'];?></td>
										<td><?php echo $salle['categorie'];?></td>
										<td><a href="#myModal" data-toggle="modal" id="<?php echo $salle['id_salle'];?>" data-target="#see-modal" title="Voir les informations de la salle <?php echo $salle['titre'];?>"><span class="glyphicon glyphicon-search"></span></a>&nbsp;
											<a href="#myModal" data-toggle="modal" id="<?php echo $salle['id_salle'];?>" data-target="#edit-modal" title="Editer les informations de la salle <?php echo $salle['titre'];?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> &nbsp;  
											<a href="#myModal" data-toggle="modal" id="<?php echo $salle['id_salle'];?>" data-target="#delete-modal" title="Supprimer les informations de la salle <?php echo $salle['titre'];?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
                                    </tr>
								<?php
								}
								?>
                                </tbody>
                            </table>
                        </div>
					</div> <!-- /.tableau -->
<script>
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});
</script>
<?php
if(isset($remplir) && $remplir != ''){
 echo $remplir;
}
?>
						<div class="col-lg-6">
							<form method="post" role="form" id="gestion_salles" enctype="multipart/form-data">
								<div class="form-group">
									<label>Titre</label>
									<input class="form-control" name="titre" placeholder="Titre de la salle">
								
								
									<label>Description</label>
									<textarea class="form-control" rows="3" name="description" placeholder="Description de la salle"></textarea>
								
								
									<label class="control-label">Photo</label>
									<input id="input-1" type="file" class="file" name="photo">
								
								
									<label>Capacité</label>
									<input class="form-control" name="capacite">
								
								
									<label>Catégorie</label>
									<select class="form-control" name="categorie">
										<option value="réunion">réunion</option>
										<option value="mariage">Mariage</option>
										<option value="bureau">Bureau</option>
										<option value="formation">Formation</option>
									</select>
								</div>
						</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Pays</label>
										<select class="form-control" name="pays">
											<option>France</option>
											<option>Espagne</option>
										</select>
										<label>Ville</label>
										<select class="form-control" name="ville">
											<option>Marseille</option>
											<option>Paris</option>
											<option>Lyon</option>
										</select>
										<label>Adresse</label>
										<textarea class="form-control" rows="3" name="adresse" placeholder="Adresse de la salle"></textarea>
										<label>Code postal</label>
										<input class="form-control" name="cp" placeholder="Code postal de la salle"><br>
										<button type="submit" class="btn btn-default" name="bouton">Enregistrer</button>
									</div>
								</div>
							</form>
					
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
		
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
		  data: {id_salle:+Id, modal:'see-salle'},
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
		  data: {id_salle:+Id, modal:'edit-salle'},
		   success: function(data)
		  
			{
				$modal.find('.edit-content').html(data);
				$('#test').click(function(e){
					e.preventDefault();
					var form = $("#formajax").serializeArray();
					$.ajax({			
					type: "post",
					url:"controleur/modal_update.php",
					data:{id_salle:Id, formulaire:form},
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
		  data: {id_salle:+Id, modal:'delete-salle'},
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