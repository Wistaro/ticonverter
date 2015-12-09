<?php
session_start();	
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
					<label>Afficher code en: </label><select name="lang">
						<option value="EN" selected>Anglais (défaut)</option>
						<option value="FR">Français</option>

					</select>
					<br /><br />
					<label>Type de programme: </label><select name="type">

						<option value="Monochrome - TI83(+)/84(+)(SE)">Monochrome - TI83(+)/84(+)(SE)</option>
						<option value="Monochrome - TI82Stats/82/76" disabled>Monochrome - TI82Stats/82/76</option>
						<option value="Couleur - TI83PCE/84+CE">Couleur - TI83PCE/84+CE</option>

					</select> <a href="help.php?section=typeprogramm" class="imginter"><img src="template/img/int.png" alt="howto" width="20" height="20" class="imginter" id="imginter"/></a><br />
					<input type="hidden" name="upload" value="file" />
					<input type="submit" action="envoyer" class="BT_send" />
					
	
				<?php } elseif($mode == "input") { ?>
	
					
					<input type="hidden" name="upload" value="input" />
					<button id="BT_arrow" class="BT" onclick="return false;">→</button><button id="BT_triangle" class="BT" onclick="return false;">►</button><button id="BT_theta" class="BT" onclick="return false;">θ</button><button id="BT_sigma" class="BT" onclick="return false;">Σ</button><button id="BT_delta" class="BT" onclick="return false;">Δ</button><button id="BT_neg" class="BT" onclick="return false;">(-)</button><button id="BT_list" class="BT" style="font-size: 12.5px;" onclick="return false;">⌊</button><button id="BT_subT" class="BT" style="height: 26px;" onclick="return false;">ᴛ</button>
					<br />
					<textarea name="code_input" placeholder="Saisissez votre code ici" class="TTREA_code" id="TTREA_code"></textarea> <br />
					<label class="SELECT_type">Type : </label><select name="type">
						<option value="Monochrome - TI83(+)/84(+)(SE)">Monochrome - TI83(+)/84(+)(SE)</option>
						<option value="Monochrome - TI82Stats/82/76" disabled>Monochrome - TI82Stats/82/76</option>
						<option value="Couleur - TI83PCE/84+CE">Couleur - TI83PCE/84+CE</option>
					</select>
					<label class="SELECT_type">Le code est en : </label><select name="lang">
						<option onclick="changeLang('tibasic_en');" value="EN" selected>Anglais (défaut)</option>
						<option onclick="changeLang('tibasic_fr');" value="FR">Français</option>
					</select><br /><br />
					<input type="submit" action="envoyer" style="float: left;" class="BT_send" />
					<button style="float: right; margin: 10px 0 10px 25px;" onclick="editor.setValue(localStorage.getItem('converterValue')); return false;">Restaurer</button><button style="float: right; margin: 10px 0 10px 25px;" onclick="localStorage.setItem('converterValue', editor.getValue()); return false;">Sauvegarder</button><br /><br />

					
			
			<?php }  else { ?>

				<p><b>TI-Converter est un outils gratuit permettant de convertir des fichiers TI-Basic.</b></p><br />

				<p><a href="?mode=upload">Télécharger un fichier</a> ou <a href="?mode=input">Saisir le programme</a></p>

			<?php } ?>
	
		</form>
	</section>

	<?php
	require('footer.php');
