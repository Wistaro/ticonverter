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
		<form method="post" action="upload.php" enctype="multipart/form-data">
	
			<?php 
				if($mode == "upload") { ?>
	
					<label>Votre fichier: 	</label><input type="file" name="fichier" id="fichier" name="fichier"/><br /><br />
					<label>Langue: </label><select name="lang">
						<option value="EN" selected>Anglais (défaut)</option>
						<option value="FR">Français</option>

					</select>
					<br /><br />
					<label>Type: </label><select name="type">

						<option value="auto" selected>Automatique (défaut)</option>
						<option value="mono">Monochrome - 83(+)/84(+)(SE)</option>
						<option value="color">Couleur - 83PCE/84+CE</option>

					</select><br />
					<input type="hidden" name="upload" value="file" />
					<input type="submit" action="envoyer" class="BT_send" />
					
	
				<?php } elseif($mode == "input") { ?>
	
					<button id="BT_arrow" class="BT" onclick="return false;">→</button><button id="BT_triangle" class="BT" onclick="return false;">►</button><button id="BT_theta" class="BT" onclick="return false;">θ</button><button id="BT_sigma" class="BT" onclick="return false;">Σ</button><button id="BT_delta" class="BT" onclick="return false;">Δ</button>
<<<<<<< HEAD
					<textarea name="code_input" placeholder="Saisissez votre code ici" class="TTREA_code" id="TTREA_code2">If A=5</textarea> 
					<br />
					<label>Langue: </label><select name="lang">
						<option value="EN" selected>Anglais (défaut)</option>
						<option value="FR">Français</option>

					</select>
					<br /><br />
					<label>Type: </label><select name="type">
						<option value="auto" selected>Automatique (défaut)</option>
						<option value="mono">Monochrome - 83(+)/84(+)(SE)</option>
						<option value="color">Couleur - 83PCE/84+CE</option>

					</select><br />
					<input type="hidden" name="upload" value="input" />
=======
					<textarea name="code_input" placeholder="Saisissez votre code ici" class="TTREA_code" id="TTREA_code"></textarea> 
>>>>>>> Commit pour l'éditeur de code (non-terminé)
					<input type="submit" action="envoyer" class="BT_send" />
			
			<?php }  else { ?>

				<p><b>TI-Converter est un outils gratuit permettant de convertir des fichiers TI-Basic.</b></p><br />

				<p><a href="?mode=upload">Télécharger un fichier</a> ou <a href="?mode=input">Saisir le programme</a></p>

			<?php } ?>
	
		</form>
	</section>

	<?php

	require('footer.php');
