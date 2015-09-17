<?php

	if(isset($_GET['mode'])){

			$mode = htmlspecialchars($_GET['mode']);
	}else{

			$mode = "";
	}


?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>TI-Convertisseur</title>
  <link rel="stylesheet" href="template/css/style.css">
  <script src="js/script.js"></script>
</head>
<body>

	<menu>

		<div class="menu">
			<ul>
				<li class="itemmenu"><a href="#">Accueil</a></li>
				<li class="itemmenu"><a href="#">Documentation</a></li>
				<li class="itemmenu"><a href="#">Votre espace</a></li>
				<li class="itemmenu"><a href="#">A propos</a></li>

			</ul>

		</div>
	</menu>

	<section class="SEC_main">
		<h1>Convertisseur multi-TI</h1>
		<form method="post" action="" enctype="multipart/form-data">
	
			<?php if($mode == "upload") { ?>

				<input type="file" name="fichier" id="fichier" name="fichier"/><br />
				<input type="submit" action="envoyer" class="BT_send" />

			<?php } elseif($mode == "input") { ?>

 				<textarea name="code_input" placeholder="Saisissez votre code ici" class="TTREA_code"></textarea><br />
 				<input type="submit" action="envoyer" class="BT_send" />

 			<?php } elseif($mode == "") { ?>

 				

 					<p><b>TI-Converter est  un outils gratuit de conversion de programmes écrits en TI-basic z80. </b></p>

 					<p>Marre des programmes qui ne sont pas compatibles avec le modèle de votre calculatrice? TI-Converter ets fait pour vous. </p>

 					<br / ><br />


 					
 			<?php } ?>
	
 			
 		</form>
 	</section
</body>
</html>
