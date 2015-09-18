<?php
			require('head.php');
			require('php/converter.class.php');

		?>

	<section class="SEC_main">
		<h1>Explorateur de programmes</h1>
		
			<p>Fichier: sudoku.txt</p>
			<hr>

			



			<?php

				$myprgm = new converter('ressources/sudoku_color.txt');


				echo '<p><b>Path: </b>'.$myprgm->getpath().'</p>';
				echo '<p><b>Type de programme: </b>'.$myprgm->get_type_of_programm().'</p>';
				echo $myprgm->print_prgm(true);


			?>
			
				

	</section>

	<?php

	require('footer.php');

	//664--670