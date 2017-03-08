	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<?php if (!isset($_GET['section']) OR $_GET['section'] == 'index'){ ?>
    <title>Lokisalle système de réservation de salle sur internet</title>
	<meta name="description" content="Vous pouvez réserver dès à présent votre salle à  pour vos réunions, mariages ou encore formation professionnelle sur lokisalle.eu de 10 à plus de 250 personnes à un prix trés abordable." />
	<meta name="Keywords" content="Lokisalle, réservation de salle, location de salle, réservation de salle sur internet, mariage, formation, réunion">
	<meta name="Subject" content="Location de salle pour les particuliers et les entreprises">
	<meta name="Identifier-Url" content="<?php echo 'http://www.lokisalle.eu'.$_SERVER['REQUEST_URI'];?> ">
<?php } ?>
<?php if ($_GET['section'] == 'salle'){ ?>
    <title>Réservez votre salle à <?php echo $_GET['ville'];?> - Lokisalle système de réservation de salle sur internet</title>
	<meta name="description" content="Vous pouvez réserver dès à présent votre salle à <?php echo $_GET['ville'];?> pour vos réunions, mariages ou encore formation professionnelle sur lokisalle.eu de 10 à plus de 250 personnes à un prix trés abordable." />
	<meta name="Keywords" content="Lokisalle, réservation de salle, location de salle, réservation de salle sur internet, mariage, formation, réunion, <?php echo $_GET['ville'];?>">
	<meta name="Subject" content="Location de salle à <?php echo $_GET['ville'];?>">
	<meta name="Identifier-Url" content="<?php echo 'http://www.lokisalle.eu'.$_SERVER['REQUEST_URI'];?> ">
<?php } ?>
	<meta name="Author" content="sf">
	<meta name="Publisher" content="sf">
	<meta name="Revisit-After" content="1 days">
	<meta name="Robots" content="all">
	<meta name="Rating" content="general">
	<meta name="Distribution" content="global">
	<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">