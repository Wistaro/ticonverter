<?php
			require('head.php');
			require('php/converter.class.php');

		?>

	<section class="SEC_main">
		<h1>Explorateur de programmes</h1>
		
			<p>Fichier: sudoku.txt</p>
			<hr>

			<?php echo converter::print_prgm('ressources/sudoku_color.txt', true); ?>
			
				

	</section>

	<?php

	require('footer.php');

	//664--670