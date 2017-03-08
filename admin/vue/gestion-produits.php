        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Gestion des produits
                            <small>Edition, supression, recherche, visualisation</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Index</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Gestion Produits
                            </li>
                        </ol>
                    </div>
					
					<div class="col-lg-12">
                        <h2>Gestion des Produits</h2>
                        <div class="table-responsive recharge">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Id_Produit</th>
                                        <th>Date d'arrivée</th>
                                        <th>Date de départ</th>
                                        <th>Id Salle</th>
										<th>Prix</th>
										<th>Etat</th>
										<th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
								foreach($produits as $produit)
								{ ?>
                                    <tr> <!-- ID PRODUITS -->
                                        <td><?php echo $produit['id_produit'];?></td>
										<td><?php echo $produit['date_arrivee_fr'];?></td>
										<td><?php echo $produit['date_depart_fr'];?></td>
                                        <td><?php echo $produit['id_salle'].' - Salle '.$produit['titre'].'<br><a data-toggle="lightbox" href="../site/img/'.$produit['photo'].'"><img src="../site/img/'.$produit['photo'].'" width=120 height:90 /></a>';?></td>
										<td><?php echo $produit['prix'].' €';?></td>
										<td><?php echo $produit['etat'];?></td>
										<td><a href="#myModal" data-toggle="modal" id="<?php echo $produit['id_produit'];?>" data-target="#see-modal" title="Voir les informations produit"><span class="glyphicon glyphicon-search"></span></a>&nbsp;
											<a href="#myModal" data-toggle="modal" id="<?php echo $produit['id_produit'];?>" data-target="#edit-modal" title="Editer les informations produit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> &nbsp;  
											<a href="#myModal" data-toggle="modal" id="<?php echo $produit['id_produit'];?>" data-target="#delete-modal" title="Supprimer les informations produit"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td></td>
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
if(isset($remplir)){
 echo $remplir;
 }
?>
					<form method="post" role="form" id="gestion_produits">
						<div class="container">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Date d'arrivée</label>
									<div class='input-group date' id='datetimepicker6'>
										<input type='text' class="form-control" name="date_arrivee" />
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
									<label>Date de départ</label>
									<div class='input-group date' id='datetimepicker7'>
										<input type='text' class="form-control" name="date_depart" />
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<label>Salle</label>
								<select class="form-control" name="id_salle">
									<?php foreach ($id_salle as $salle){ 
										echo '<option value="'.$salle['id_salle'].'">'.$salle['id_salle'].' - '.$salle['titre'].' - '.$salle['adresse'].', '.$salle['cp'].', '.$salle['ville'].' - '.$salle['capacite'].' Pers.</option>'; 
									}?>
								</select>
								<label>Prix</label>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-eur"></i></span>
									<input type="text" class="form-control" placeholder="Prix en euros" name="prix">
								</div>
								<button type="submit" class="btn btn-default" name="bouton">Enregistrer</button>
							</div>
						</div>
					</form>				
                </div>
                <!-- /.row -->

            </div>
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
		  data: {id_produit:+Id, modal:'see-produit'},
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
		  data: {id_produit:+Id, modal:'edit-produit'},
		   success: function(data)
		  
			{
				$modal.find('.edit-content').html(data);
				$('#test').click(function(e){
					e.preventDefault();
					var form = $("#formajax").serializeArray();
					$.ajax({			
					type: "post",
					url:"controleur/modal_update_produit.php",
					data:{id_produit:Id, formulaire:form},
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
		  data: {id_produit:+Id, modal:'delete-produit'},
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