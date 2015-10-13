<?php

			session_start();
			require('head.php');




			$current_prgm = new Converter($_SESSION['src'],$_SESSION['type'], $_SESSION['lang']);

			/*$newPrgm->setContentFromString($current_prgm->ColorToMono());
			$newPrgm->saveVarToFile("files/", "trololol");
*/






		?>

	<section class="SEC_main">
		<h1>Fichier converti</h1>

		<?php 
			 ?>
		
			<textarea><?php echo $current_prgm->getSrc();?></textarea>
			<textarea><?php echo $current_prgm->colorToMono();?></textarea>
			
				

	</section>

	<?php

	require('footer.php');