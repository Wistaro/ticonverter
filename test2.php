<?php
			require('head.php');
			require('php/converter.class.php');
			require('tokens/tokens_array_type.php');

		?>

	<section class="SEC_main">
		<h1>Explorateur de programmes</h1>
		
			<p>Fichier: sudoku.txt</p>
			<hr>

			<div id="message" style="display:none;"><img src="template/img/loader.gif" alt="loader"/> Chargement en cours...</div>
			

			



			<?php

				//loading code begin
				echo "<script>document.getElementById('message').style.display = \"block\";</script>";
				ob_flush();
				flush();
				ob_flush();
				flush();



				$myprgm = new converter('ressources/sudoku_color.txt');


				echo '<p><b>Path: </b>'.$myprgm->getpath().'</p>';

				//$myprgm->search_lang();


				echo '<p><b>Type de programme: </b>'.$myprgm->get_type_of_programm().'</p>';

				

				echo '<p><b>Langue: </b>'.$myprgm->getlang().'</p>';

				echo $myprgm->print_prgm(true);


				//loading code ending
				echo "<script>document.getElementById('message').style.display = \"none\";</script>";




				

	

			?>
			
				

	</section>

	<?php

	require('footer.php');

	//664--670