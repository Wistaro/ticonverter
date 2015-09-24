<?php
			require('head.php');

		?>

	<section class="SEC_main">
		<h1>GlobalTests</h1>
		
			<p>GlobalTest</p>

			<?php

				include_once "libAdriweb\src/autoloader.php";

				use tivars\TIVarFile;
				use tivars\TIVarType;
				use tivars\TIVarTypes;

	$testPrgm = TIVarFile::loadFromFile('ressources/snake.8xp');

	$source = $testPrgm->getReadableContent(['lang' => 'fr']);

	$myprgm = new converter($source, 'file');

	
	
	
	

	


			?>
			
				

	</section>

	<?php

	require('footer.php');