<?php
	session_start();
	$_SESSION['lang'] = "EN";

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

					</select> <span class="imginter"><img src="template/img/int.png" alt="howto" width="20" title="Couleur ou Noir et blanc" height="20" class="imginter" id="imginter"/></span><br />
					<input type="hidden" name="upload" value="file" />
					<input type="submit" action="envoyer" class="BT_send" />
					
	
				<?php } elseif($mode == "input") { ?>
	
					
					<input type="hidden" name="upload" value="input" />
					<input type="text" name="filename" maxleng="8" placeholder="Nom du fichier" style="width: 99%; margin-bottom: 40px; background: #151515; border: none; color: #D0D0E0; padding: 5px;" required />
					<button id="BT_arrow" class="BT" onclick="return false;">→</button><button id="BT_triangle" class="BT" onclick="return false;">►</button><button id="BT_theta" class="BT" onclick="return false;">θ</button><button id="BT_sigma" class="BT" onclick="return false;">Σ</button><button id="BT_delta" class="BT" onclick="return false;">Δ</button><button id="BT_neg" class="BT" onclick="return false;">(-)</button><button id="BT_list" class="BT" style="font-size: 12.5px;" onclick="return false;">⌊</button><button id="BT_subT" class="BT" style="height: 26px;" onclick="return false;">ᴛ</button>
					<br />
					<textarea name="code_input" placeholder="Saisissez votre code ici" class="TTREA_code" id="TTREA_code"></textarea> <br />
					<label class="SELECT_type">Type : </label><select name="type">
						<option value="Monochrome - TI83(+)/84(+)(SE)">Monochrome - TI83(+)/84(+)(SE)</option>
						<option value="Couleur - TI83PCE/84+CE">Couleur - TI83PCE/84+CE</option>
						<option value="Monochrome - TI82Stats/82/76" disabled>Monochrome - TI82Stats/82/76</option>
					</select>
					<label class="SELECT_type">Le code est en : </label><select name="lang">
						<option onclick="changeLang('tibasic_en');" value="EN" selected>Anglais (défaut)</option>
						<option onclick="changeLang('tibasic_fr');" value="FR">Français</option>
					</select><br /><br />
					<input type="submit" action="envoyer" style="float: left;" class="BT_send" />
					<button style="float: right; margin: 10px 0 10px 25px;" onclick="editor.setValue(localStorage.getItem('converterValue')); return false;">Restaurer</button><button style="float: right; margin: 10px 0 10px 25px;" onclick="localStorage.setItem('converterValue', editor.getValue()); return false;" title="Cette option vous permettra de sauvegarder votre code, même une fois votre ordinateur éteint.">Sauvegarder</button><br /><br />

					
			
			<?php }  else { ?>

				<p><b>TI-Converter est un outils gratuit permettant de convertir des fichiers TI-Basic monochrome vers couleur et vice-versa</b></p> Il permet également de visualiser le contenu de ces fichiers.<br />
				<br /><div class="diclaimer"  style="font-size: 80%;"><hr>
				Notez les informations suivantes:
				<ul>
					<li>Ce logiciel ne fonctionne qu'avec des programmes écrits en TI-Basic z80 et/ou eZ80. Les programmes en C, ou en assembleur ne sont pas supportés.</li><br />
					<li>Dans le cas où ce logiciel serait utilisé pour des jeux ou applications de taille importante et manipulant beaucoup l'écran graphique, restez vigilant quand au résultat du convertisseur. Suivant la manère de programmer, il se peut que la conversion aboutisse à un jeux/une application inutilisable!</li><br />
					<li>Ce logiciel fonctionne uniquement dans le cas où le pas des axes x et y sont unitaires, soit le delta x et le delta y sont à 1. Dans le cas inverse, la conversion est inutile et aboutira à des erreurs.</li>


				</ul>
				<hr><br ></div>
				<center><p><a href="?mode=upload">Télécharger un fichier</a> ou <a href="?mode=input">Saisir le programme</a></p></center>

			<?php } ?>
	
		</form>
	</section>

	<?php
	require('footer.php');
