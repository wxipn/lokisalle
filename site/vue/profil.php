    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
			<h1>Mon profil Lokisalle</h1>
                <div class="row">
				<?php if($commandes){ ?>
					<h2>Mes dernières commandes</h2>
					<div class="table-responsive">
                        <table class="table table-hover">
							<thead>
								<tr>
									<th>Commande passée le</th>
									<th>Salle</th>
									<th>Ville</th>
									<th>Date</th>
									<th>Prix</th>
								</tr>
							</thead>
							<?php foreach($commandes as $commande){ 
									if($commande['prix'] != '') {?>
							<tbody>
								<tr>
									<td><?php echo $commande['date_enregistrement_fr']; ?></td>
									<td><?php echo $commande['titre']; ?></td>
									<td><?php echo $commande['ville']; ?></td>
									<td><?php echo $commande['date_arrivee_fr'].' du '.$commande['date_depart_fr']; ?></td>
									<td><?php echo $commande['prix'].'€'; ?></td>
								</tr>
							</tbody>
							<?php   }
							
								 } ?>
                        </table>
                    </div>
					<?php } else { ?>
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-info">
							<i class="glyphicon glyphicon-shopping-cart">  </i>
								 &nbsp;Vous n'avez pas de commande !!
							</div>
						</div>
					</div>
					<?php } ?>
                </div>
            </div>
        </div>
		<div class="row">
			<div class="col-sm-4">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Mes informations<div class="pull-right">Inscrit le <strong><?php echo $membre['date_enregistrement_fr'];?></strong></div></h3>
					</div>
					<div class="panel-body">
						Mon pseudo : <?php echo $membre['pseudo'];?><br>
						Mon Nom : <?php echo $membre['nom'];?><br>
						Mon Prénom : <?php echo $membre['prenom'];?><br>
						Mon Email : <?php echo $membre['email'];?><br>
					</div>
				</div>
			</div>
		</div>
    </div>
    <!-- /.container -->