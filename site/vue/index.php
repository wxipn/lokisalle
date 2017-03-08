    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-md-3">
			<form action="index.php?section=recherche" class="navbar-left" method="post">
               

				<div class="alert alert-info">
					<p class="lead">Catégorie</p>
					<?php foreach($categories as $categorie){?>
					<div class="radio">
						<label>
						<input id="optionsRadios1" name="categorie" value="<?php echo $categorie['categorie'];?>" type="radio">
						<?php echo ucfirst($categorie['categorie']);?>
						</label>
					</div>
					<?php }?>
				</div>
				
				<div class="alert alert-info">
					<p class="lead">Ville</p>
					<?php foreach($villes as $ville){?>
					<div class="radio">
						<label>
						<input id="optionsRadios1" name="ville" value="<?php echo $ville['ville'];?>" type="radio">
						<?php echo ucfirst($ville['ville']);?>
						</label>
					</div>
					<?php }?>
				</div>
				<p class="lead">Capacité</p>
                <div class="form-group">
					<select class="form-control" name="capacite">
					<?php foreach($capacites as $capacite){?>
						<option value="<?php echo $capacite['capacite'];?>"><?php echo $capacite['capacite'];?></option>
					<?php }?>
					</select>
				</div>
				<p class="lead">Prix</p>
                <div class="list-group">
					<input id="ex2" name="prix" type="text" class="span2" value="" data-slider-min="10" data-slider-max="1000" data-slider-step="5" data-slider-value="[250,450]"/> <b>€ 1000</b>
				</div>
				<div class="form-group">
				<p class="lead">Période</p>
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
				<hr>
				<button type="submit" class="btn btn-default">Chercher</button>
			</form>
            </div>
			
            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="img/salle_mer_du_nord.jpg" width="800" height="300px" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="img/salle_panorama.jpg" width="800" height="300px" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="img/salle_demanche.jpg" width="800" height="300px" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">
				<?php foreach($salles as $salle){?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="img/<?php echo $salle['photo'];?>" alt="la salle <?php echo $salle['titre'];?>">
                            <div class="caption">
                                <h4 class="pull-right"><?php echo $salle['prix'];?> €</h4>
                                <h4><a href="index.php?section=salle&id=<?php echo $salle['id_salle'];?>&ville=<?php echo $salle['ville'];?>"><?php echo $salle['titre'];?></a>
                                </h4>
                                <p><?php echo mb_strimwidth($salle['description'], 0, 65, '...');?></p>
								<p class="glyphicon glyphicon-calendar"> <?php echo $salle['date_arrivee_fr'].' au '.$salle['date_depart_fr'];?></p>
                            </div>
                            <div class="ratings">
                                <p style="color:black" class="pull-right glyphicon glyphicon-search"><a href="index.php?section=salle&id=<?php echo $salle['id_salle'];?>&ville=<?php echo $salle['ville'];?>">Voir</a></p>
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
				<?php }?>
                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->