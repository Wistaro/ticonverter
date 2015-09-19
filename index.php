<?php
	if(isset($_GET['mode'])){
			$mode = htmlspecialchars($_GET['mode']);
	}else{
			$mode = "";
	}

			require('head.php');

		?>

	<section class="SEC_main">
		<h1 id="BT_send">Convertisseur multi-TI</h1>
		<form method="post" action="" enctype="multipart/form-data">
	
			<?php 
				if($mode == "upload") { ?>
	
					<input type="file" name="fichier" id="fichier" name="fichier"/><br /><br />
					<input type="submit" action="envoyer" class="BT_send" />
	
				<?php } elseif($mode == "input") { ?>
	
					<button id="BT_arrow" class="BT" onclick="return false;">→</button><button id="BT_triangle" class="BT" onclick="return false;">►</button><button id="BT_theta" class="BT" onclick="return false;">θ</button><button id="BT_sigma" class="BT" onclick="return false;">Σ</button><button id="BT_delta" class="BT" onclick="return false;">Δ</button>
					<textarea name="code_input" placeholder="Saisissez votre code ici" class="TTREA_code" id="TTREA_code">If A=5</textarea> 
					<input type="submit" action="envoyer" class="BT_send" />
			
			<?php }  else { ?>

				<p><b>TI-Converter est un outils gratuit permettant de convertir des fichiers TI-Basic.</b></p><br />

				<p><a href="?mode=upload">Télécharger un fichier</a> ou <a href="?mode=input">Saisir le programme</a></p>

			<?php } ?>
	
		</form>
	</section>

	<?php

	require('footer.php');