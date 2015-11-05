<?php
			require('head.php');
			if(!isset($_GET['xpxcolor'])){

					$xpxcolor = "";

			}else{

				$xpxcolor = htmlspecialchars($_GET['xpxcolor']);

			}
			if(!isset($_GET['ypxcolor'])){

					$ypxcolor = "";

			}else{

				$ypxcolor = htmlspecialchars($_GET['ypxcolor']);

			}
			if(!isset($_GET['xpxmono'])){

					$xpxmono = "";

			}else{

				$xpxmono = htmlspecialchars($_GET['xpxmono']);

			}
			if(!isset($_GET['ypxmono'])){

					$ypxmono = "";

			}else{

				$ypxmono = htmlspecialchars($_GET['ypxmono']);

			}



		?>

	<section class="SEC_main">
		<h1>Calcul de coordonnées</h1>

		Cet outils va vous permettre de convertir des coordonnées pour les différents modèle.<br ><br />
		<u><b>Rappels:</b></u> 

			<ul>
				<li><b>Rapport de réduction pixels:</b> 2.81 (x) * 2.66 px (y) </li>
				<li><b>Rapport de réduction texte:</b> 2.63 (y) * 2.80 px (x)</li>


			</ul><br /><br />
		
			<h2>Conversion coordonnées pixels: </h2>
			<form method="post" action="conv.php">
			<label>Coordonnée pixel sur x (horizontale) pour écran <b>couleur</b>: </label><input type="text" name="xpxcolor" value="<?php echo $xpxcolor; ?>" /><br />
			<label>Coordonnée pixel sur y (verticale)  pour écran <b>couleur</b>: </label><input type="text" name="ypxcolor" value="<?php echo $ypxcolor; ?>"/><br /><br /><br />

			<label>Coordonnée pixel sur x (horizontale) pour écran <b>monochrome</b>: </label><input type="text" name="xpxmono" value="<?php echo $xpxmono; ?>"/><br />
			<label>Coordonnée pixel sur y (verticale)  pour écran <b>monochrome</b>: </label><input type="text" name="ypxmono" value="<?php echo $ypxmono; ?>"/><br />
			<input type="submit" name="px" value="Convertir" />

					</form>
			<h2>Conversion coordonnées texte: </h2>

			
			
				

	</section>

	<?php

	require('footer.php');