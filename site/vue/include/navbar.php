	<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php?section=index">LOKISALLE</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                        <li><a href="#" role="button" data-toggle="modal" data-target="#myCtForm"><span>Contact</span></a></li>
                </ul>
				<?php if(!isset($_SESSION['membre']) || $_SESSION['membre'] == false){?>
				<form class="navbar-form navbar-right" role="search" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="pseudo" placeholder="Pseudo">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Mot de passe">
                    </div>
                    <button type="submit" class="btn btn-default">Connexion</button>
                </form>
			<?php } else {?>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="glyphicon glyphicon-user"></b> <?php if(isset($_SESSION['membre'])){ echo 'Bienvenue '.$_SESSION['membre']['pseudo'];} ?><b class="caret"></b></a>
					  <ul class="dropdown-menu dropdown-menu-default">
						<li><a href="index.php?section=profil">Profil</a></li>
						<?php if(isset($internauteEstConnecteEtEstAdmin) && $internauteEstConnecteEtEstAdmin == true){?>
						<li><a href="../admin/index.php?section=index" target="_blank">Administration</a></li>
						<?php }?>
						<li><a href="index.php?section=logout">Déconnexion</a></li>
					  </ul>
					</li>
				</ul>
				<?php }if(isset($contenu)){ echo $contenu; }?>				
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	
	<!-- Modal content-->
  <div class="modal fade" id="myCtForm" role="dialog">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header" style="padding:10px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-envelope"></span> Contact</h4>
        </div>

        <div class="modal-body" style="padding:40px 50px;">
          <form id="feedbackForm" data-toggle="validator" data-disable="false">
		  <div class="form-group">
              <label class="control-label" for="name">Nom</label>
              <div class="input-group">
                <input type="text" class="form-control contact" id="name" name="name" placeholder="Votre Nom" required/>
              </div>
              <span class="help-block" style="display: none;">Merci d'entrer votre nom.</span>
            </div>
			
			<div class="form-group">
              <label class="control-label" for="email"><span class="glyphicon glyphicon-envelope"></span> Email</label>
              <div class="input-group">
                <input type="email" class="form-control contact" id="email" name="email" placeholder="Votre Email" required/>
              </div>
              <span class="help-block" style="display: none;">Merci de rentrer une adresse mail valide.</span>
            </div>

			<div class="form-group">
              <label class="control-label" for="message"><span class="glyphicon glyphicon-text-background"></span> Message</label>
              <div class="input-group">
                <textarea rows="5" cols="30" class="form-control contact" id="message" name="message" placeholder="Votre message" required></textarea>
              </div>
              <span class="help-block" style="display: none;">Merci de rentrer un message.</span>
            </div>
			
				<div class="g-recaptcha" data-sitekey="6LekYRYUAAAAADO9DZVGaJX0WVB0qnDe58Vn5RAH"></div>
              <button type="submit" id="feedbackSubmit" class="btn btn-primary btn-block" data-loading-text="Traitement..."><span class="glyphicon glyphicon-send"></span> Envoyer</button>
          </form>
        </div>
        <div class="modal-footer">

        </div>
      </div>
      
    </div>
  </div>
  <!-- END Modal content-->