<?php

	session_start();

	

			require('head.php');

			/* Switching convert mode */		
			if($_SESSION['type'] == "Monochrome - TI83(+)/84(+)(SE)"){

				$_SESSION['format_convert'] = "Couleur - 83PCE/84+CE";
				

			}elseif ($_SESSION['type'] == "Couleur - TI83PCE/84+CE") {
				
				$_SESSION['format_convert'] ="Monochrome - TI83(+)/84(+)(SE)";
			}

			

		?>

	<section class="SEC_main">

		<h1>TI Converter</h1>
		
			<p>Vérification avant conversion</p><hr />

	<?php

	if(isset($_SESSION['src'])){

		$src = $_SESSION['src'];

	}else{

		$src = '';
	}



	if($_SESSION['error_file_uploaded'] == 'ok'){ 	?>


			<h2>Votre programme</h2>

				<p>
						<b>Type: </b> <?=$_SESSION['type']; ?><br />
						<b>Langue: </b> <?=$_SESSION['lang']; ?><br />
						<?php if($_SESSION['uploadMode'] == 'file'){ ?><b>Taille: </b> <?=$_SESSION['sizeOfPrgm']; ?> octets<br /><?php } ?>
						<b>Nom: </b> <?=$_SESSION['filename']; ?> <span class="imginter"><img src="template/img/int.png" alt="howto" width="20" title="Nom affiché dans le menu Prgm de la calculatrice" height="20" class="imginter" id="imginter"/></span><br />
						


				</p>

				<u><b>Attention!</b></u>
				<ul>
					<li>Vérifier bien qu'il n'y a qu'une seule instruction par ligne. Parfois, le signe ":" peut être utilisé pour s'affranchir du retour à la ligne. Dans ce cas, vous devez séparer le code sur une autre ligne.</li><br >
					<li>Certains caractères peuvent mal être encodé. Vous devez les remplacer par d'autres pour éviter un crash de la conversion.</li><br >
					<li>Si vous remarquez un comportement étrange (une parenthèse mal placée, un affichage décallé, etc.), signalez-le <a href="https://tiplanet.org/forum/viewtopic.php?f=10&t=17212">par ici!</a></li><br >

				</ul>

			
		<form method="post" action="result.php" >	
			<h2>Code source: </h2>
					<textarea name="sourcecode" class="TTREA_code" id="TTREA_code"><?php echo $src; ?></textarea><br /> 

			<label>Convertir en: </label><select name="conversion">

						<option value="convert_none" selected>Ne rien convertir</option>
						<option value="<?=$_SESSION['format_convert']; ?>"><?=$_SESSION['format_convert']; ?></option>
						
					</select><br /><br />
			<label>Exportation: </label><select name="type">

						<option value="expt_file" selected>Par fichier (avec extension d'origine)</option>
						<option value="expt_text">Par texte brut</option>
						<option value="expt_profile" disabled>Stockage dans l'espace membre (utilisateurs inscrits seulement)</option>

					</select><br /><br /><br />

					<input type="hidden" value='toto' name="code_input" />

					<input type="submit" value="Allons-y!" />
		</form>

		<?php }else{

			echo '<p class="error">'.$_SESSION['error_file_uploaded'].'</p>';

		}



		 ?>	


	</section>

	<?php

	require('footer.php');
