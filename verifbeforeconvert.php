<?php
		session_start();
			require('head.php');

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

			<h2>Code source: </h2>
					<textarea name="code_input" class="TTREA_code" id="?TTREA_code"><?php echo $src; ?></textarea><br /> 
			
		<form method="post" action="" >	

			<label>Convertir en: </label><select name="type">

						<option value="convert_none" selected>Ne rien convertir</option>
						<option value="convert_to_mono">Monochrome - 83(+)/84(+)(SE)</option>
						<option value="convert_to_color">Couleur - 83PCE/84+CE</option>

					</select><br /><br />
			<label>Exportation: </label><select name="type">

						<option value="expt_file" selected>Par fichier (avec extension d'origine)</option>
						<option value="expt_text">Par texte brut</option>
						<option value="expt_profile" disabled>Stockage dans l'espace membre (utilisateurs inscrits seulement)</option>

					</select><br /><br /><br />

					

					<input type="submit" value="Allons-y!" />
		</form>

		<?php }else{

			echo $_SESSION['error_file_uploaded'];

		}



		 ?>	


	</section>

	<?php

	require('footer.php');