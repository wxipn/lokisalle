<!-- Page Content -->
    <div class="container">

        <div class="row">
			
            <div class="col-md-12">
                <div class="row">
				<?php 
				if(isset($resultats) &&  $resultats!= false){
					foreach($resultats as $resultat){
				$date_arrivee_fr = date('d-m-Y h:m:s', strtotime($resultat['date_arrivee_fr']));
				$date_depart_fr = date('d-m-Y h:m:s', strtotime($resultat['date_depart_fr']));
					?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="../site/img/<?php echo $resultat['photo'];?>" alt="">
                            <div class="caption">
                                <h4 class="pull-right"><?php echo $resultat['prix'];?> €</h4>
                                <h4><a href="index.php?section=salle&id=<?php echo $resultat['id_salle'];?>&ville=<?php echo $resultat['ville'];?>"><?php echo $resultat['titre'];?></a>
                                </h4>
                                <p><?php echo mb_strimwidth($resultat['description'], 0, 65, '...');?></p>
								<p class="glyphicon glyphicon-calendar"> <?php echo $date_arrivee_fr.' au '.$date_depart_fr;?></p>
                            </div>
                            <div class="ratings">
                                <p style="color:black" class="pull-right glyphicon glyphicon-search"><a href="index.php?section=salle&id=<?php echo $resultat['id_salle'];?>&ville=<?php echo $resultat['ville'];?>">Voir</a></p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>
				<?php } 
				} else { echo '<div class="alert alert-info">'.$recherche_vide.'</div>'; }?>
                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->