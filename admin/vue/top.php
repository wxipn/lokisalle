        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            TOP 5
                            <small> des salles les mieux notées, des plus commandées, des membres qui achètent en quantitée et en prix</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Index</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> TOP 5
                            </li>
                        </ol>
                    </div>
					<div class="col-lg-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="glyphicon glyphicon-stats"></i> TOP 5 des salles les mieux notés</h3>
                            </div>
                            <div class="panel-body">
							<?php foreach($top_best_rate as $best_rate){?>
								<div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <span class="badge"><?php echo $best_rate['note_moyenne'];?></span>
                                        <i class="glyphicon glyphicon-thumbs-up"></i> <?php echo $best_rate['titre'];?>
                                    </a>
                                </div>
							<?php }?>
                            </div>
                        </div>
                    </div>

					<div class="col-lg-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="glyphicon glyphicon-stats"></i> TOP 5 des salles les plus commandées</h3>
                            </div>
                            <div class="panel-body">
							<?php foreach($top_commandes as $top_commande){ ?>
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <span class="badge"><?php echo $top_commande['nombre'];?></span>
                                        <i class="glyphicon glyphicon-home"></i> <?php echo $top_commande['titre'];?>
                                    </a>
                                </div>
								<?php }?>
                            </div>
                        </div>
                    </div>
					<div class="col-lg-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="glyphicon glyphicon-stats"></i> TOP 5 des membres qui achètent le plus en quantitée</h3>
                            </div>
                            <div class="panel-body">
							<?php foreach($members_top as $member_top){
									if($member_top['pseudo'] != ''){?>
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <span class="badge"><?php echo $member_top['nombre'];?></span>
                                        <i class="glyphicon glyphicon-thumbs-up"></i> <?php echo $member_top['pseudo'];?>
                                    </a>
                                </div>
							<?php   }
								 }?>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="row">
					<div class="col-lg-4">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="glyphicon glyphicon-stats"></i> TOP 5 des membres qui achètent le plus cher</h3>
								</div>
								<div class="panel-body">
								<?php foreach($members_prix as $member_prix){ ?>
									<div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <span class="badge"><?php echo $member_prix['prix_total'];?></span>
                                        <i class="glyphicon glyphicon-thumbs-up"></i> <?php echo $member_prix['pseudo'];?>
                                    </a>
                                </div>
								<?php }?>
								</div>
							</div>
						</div>
				</div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->