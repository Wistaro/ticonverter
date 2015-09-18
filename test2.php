<?php
			require('head.php');
			require('php/converter.class.php');

		?>

	<section class="SEC_main">
		<h1>Explorateur de programmes</h1>
		
			<p>Fichier: sudoku.txt</p>
			<hr>

			<?php //echo converter::read_line('ressources/sudoku_color.txt', 10); ?>



			<?php
				echo converter::get_typeofprogramm('ressources/sudoku_color.txt', 'EN');

			?>
			
				

	</section>

	<?php

	require('footer.php');

	//664--670