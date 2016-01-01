<?php

			session_start();
			require('head.php');
			
			if($_SESSION['type'] == "Monochrome - TI83(+)/84(+)(SE)"){

				$_SESSION['format_convert'] = "Couleur - 83PCE/84+CE";
				

			}elseif ($_SESSION['type'] == "Couleur - TI83PCE/84+CE") {
				
				$_SESSION['format_convert'] ="Monochrome - TI83(+)/84(+)(SE)";
			}

			

		?>

	<section class="SEC_main">
		<h1>TI Converter</h1>
		
			<p>Conversion du code: 0%</p><hr />

	<?php

	if(isset($_SESSION['src'])){
		$src = $_SESSION['src'];

	}else{

		$src = '';
	}



	if($_SESSION['error_file_uploaded'] == 'ok'){ 	?>


			<h2>Votre programme</h2>

				<p>
						<b>Type: </b> <?php echo $_SESSION['type']; ?><br />
						<b>Langue: </b> <?php echo $_SESSION['lang']; ?><br />
						


				</p>

			
		<form method="post" action="result.php" >	
			<h2>Code source: </h2>
					<textarea name="sourcecode" class="TTREA_code" id="TTREA_code"><?php echo $src; ?></textarea><br /> 

			<label>Convertir en: </label><select name="conversion">

						<option value="convert_none" selected>Ne rien convertir</option>
						<option value="<?php echo $_SESSION['format_convert']; ?>"><?php echo $_SESSION['format_convert']; ?></option>
						
					</select><br /><br />
			<label>Exportation: </label><select name="type">

						<option value="expt_file" selected>Par fichier (avec extension d'origine)</option>
						<option value="expt_text">Par texte brut</option>
						<option value="expt_profile" disabled>Stockage dans l'espace membre (utilisateurs inscrits seulement)</option>

					</select><br /><br /><br />

					<input type="hidden" value='toto'name="code_input" />

					<input type="submit" value="Allons-y!" />
		</form>

		<?php }else{

			echo '<p class="error">'.$_SESSION['error_file_uploaded'].'</p>';

		}



		 ?>	


	</section>

	<?php

	require('footer.php');
