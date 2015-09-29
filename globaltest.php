<?php
			require('head.php');

		?>

	<section class="SEC_main">
		<h1>GlobalTests</h1>
		
			<p>GlobalTest</p>

			<?php

	/*			include_once "libAdriweb\src/autoloader.php";

				use tivars\TIVarFile;
				use tivars\TIVarType;
				use tivars\TIVarTypes;

	 $testPrgm = TIVarFile::loadFromFile('ressources/snake.8xp');
	$source = $testPrgm->getReadableContent(['lang' => 'fr']);
	$myprgm = new converter($toto, 'input'); */



	$toto = "Disp A\nTextColor(RED)\nDisp \"toto\"\nBackground On\nBackground Off\nDisp B+D\nBorderColor\n";

	

	function iscoloredonly($currentline){

		/* version without regex*/
			$return = false;
			$totalcolor = array('Background', 'TextColor', 'CouleurTexte', 'ArrPlan', 'GraphColor', 'CouleurGraph', 'BorderColor', 'CouleurBord');

			for ($i=0; $i <=count($totalcolor)-1; $i++) { 
				
					if (stripos($currentline,$totalcolor[$i]) !== false) {
						return true;
					}
			}

				return false; 
	}	



 /*  Effacement ligne test  - AVANT transformation */

	echo 'AVANT (colored)<br ><br />';
		$aze = explode("\n", $toto);
		for ($i=1; $i <=count($aze)-1; $i++) { 

				echo $aze[$i-1].'<br />';

			}


			/* Conversion*/

		$toto2 = "";	
		for ($i=1; $i <=count($aze)-1; $i++) { 
			
			$currentline = $aze[$i-1]."\n";

	
						if(iscoloredonly($currentline)){

							//effacement total
							$currentline = "";
							
							}

					if("toto" == "toto"){ //vérification par regex, à faire. Les regex à tester sont dans php/regex.php

								//effacement partiel
					}

				$toto2 = $toto2.$currentline;

		}

	 /*  Effacement ligne test  - APRES transformation */
		echo '<hr>';
		echo 'APRES (monochrome)<br /><br />';
		$aze = explode("\n", $toto2);
		for ($i=1; $i <=count($aze)-1; $i++) { 

				echo $aze[$i-1].'<br />';

			}

			

	
	
	
	

	

	


			?>
			
				

	</section>

	<?php

	require('footer.php');