        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Gestion des commandes
                            <small>Edition, supression, recherche, visualisation</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Index</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Gestion commandes
                            </li>
                        </ol>
                    </div>
					<div class="col-lg-12">
                        <h2>Gestion des commandes</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Id_Commande</th>
                                        <th>Id_Membre</th>
                                        <th>Id_Produit</th>
                                        <th>Prix</th>
										<th>Date d'enregistrement</th>				
										<th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
								foreach($commandes as $commande)
								{ ?>
                                    <tr> <!-- ID MEMBRES -->
                                        <td><?php echo $commande['id_commande'];?></td>
                                        <td><?php echo $commande['id_membre'].' - '.$commande['email'];?></td>
										<td><?php echo $commande['id_salle'].' - '.$commande['titre'];?><br/><?php echo $commande['date_arrivee_fr'].' au '.$commande['date_depart_fr'];?></td>
										<td id="avis"><?php echo $commande['prix'];?> €</td>
										<td><?php echo $commande['date_enregistrement_fr'];?></td>
										<td><a href="#myModal" data-toggle="modal" id="<?php echo $commande['id_commande'];?>" data-target="#see-modal" title="Voir les informations de la commande"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a> &nbsp;  
											<a href="#myModal" data-toggle="modal" id="<?php echo $commande['id_commande'];?>" data-target="#delete-modal" title="Supprimer informations de la commande"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
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
                    <h4 class="modal-title" id="myModalLabel">Information de la commande</h4>
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
	
	<!-- MODAL-DELETE -->	
    <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" id="close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Information de suppression de la commande</h4>
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
		  data: {id_commande:+Id, modal:'see-commande'},
		   success: function(data)
		  
			{
				$modal.find('.edit-content').html(data);
			}
	  });    
    });
	
	
	$('#delete-modal').on('show.bs.modal', function(e) {  
	var $modal = $(this),
	Id = e.relatedTarget.id;
	  $.ajax({
		  method: 'POST',
		  url: 'controleur/modal_del.php',
		  data: {id_commande:+Id, modal:'delete-commande'},
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