        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Gestion des avis
                            <small>Edition, supression, recherche, visualisation</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Index</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Gestion avis
                            </li>
                        </ol>
                    </div>
					<div class="col-lg-12">
                        <h2>Gestion des avis</h2>
                        <div class="table-responsive recharge">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Id_Avis</th>
                                        <th>Id_Membre</th>
                                        <th>Id_Salle</th>
                                        <th>Commentaire</th>
										<th>Note</th>
										<th>Date d'enregistrement</th>				
										<th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
								foreach($avis as $avis_membre)
								{ ?>
                                    <tr> <!-- ID MEMBRES -->
                                        <td><?php echo $avis_membre['id_avis'];?></td>
                                        <td><?php echo $avis_membre['id_membre'].' - '.$avis_membre['email'];?></td>
										<td><?php echo $avis_membre['id_salle'].' - '.$avis_membre['categorie'].' - '.$avis_membre['titre'];?></td>
										<td id="avis"><?php echo $avis_membre['commentaire'];?></td>
										<td><?php for($i=1; $i<=$avis_membre['note']; $i++){ echo '<div class="rating" id="rating">☆</div>'; } ?></td>
										<td><?php echo $avis_membre['date_enregistrement_fr'];?></td>
										<td><a href="#myModal" data-toggle="modal" id="<?php echo $avis_membre['id_avis'];?>" data-target="#see-modal" title="Voir l'avis de la salle <?php echo $avis_membre['id_salle'];?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a> &nbsp;  
											<a href="#myModal" data-toggle="modal" id="<?php echo $avis_membre['id_avis'];?>" data-target="#edit-modal" title="Editer l'avis de la salle <?php echo $avis_membre['id_salle'];?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> &nbsp;  
											<a href="#myModal" data-toggle="modal" id="<?php echo $avis_membre['id_avis'];?>" data-target="#delete-modal" title="Supprimer  l'avis de la salle <?php echo $avis_membre['id_salle'];?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
                                    </tr>
								<?php 
								}
								?>
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- /.tableau -->
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
		  data: {id_avis:+Id, modal:'see-avis'},
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
		  data: {id_avis:+Id, modal:'edit-avis'},
		   success: function(data)
		  
			{
				$modal.find('.edit-content').html(data);
				$('#test').click(function(e){
					e.preventDefault();
					var form = $("#formajax").serializeArray();
					$.ajax({			
					type: "post",
					url:"controleur/modal_update_avis.php",
					data:{id_avis:Id, formulaire:form},
					success:function(data, retour){
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
		  data: {id_avis:+Id, modal:'delete-avis'},
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