<?php
			require('head.php');

		?>

	<section class="SEC_main">
		<h1>GlobalTests</h1>


			<p>

				<?php
					
									?>


			</p>
		
			<p>GlobalTest</p>

			<?php

	/*			include_once "libAdriweb\src/autoloader.php";

				use tivars\TIVarFile;
				use tivars\TIVarType;
				use tivars\TIVarTypes;

	 $testPrgm = TIVarFile::loadFromFile('ressources/snake.8xp');
	$source = $testPrgm->getReadableContent(['lang' => 'fr']);
	$myprgm = new converter($toto, 'input'); */



	$toto = "Line(2A+3,5,999,88,Red)\nDisp A\nTextColor(RED)\nDisp \"Background On\"\nBackground On\nBackground Off\nDisp B+D\nBorderColor\nGraphColor RED\nLine(0,0,0,0,Red)\n";

	

	function iscoloredtotal($currentline){

		include('php/regex.php');

	                   

		$totalcolor = array('Background', 'TextColor', 'CouleurTexte', 'ArrPlan', 'GraphColor', 'CouleurGraph', 'BorderColor', 'CouleurBord');

			for ($i=0; $i <=count($totalcolor)-1; $i++) { 
				
					if (preg_match('#^'.$totalcolor[$i].'#i', $currentline)) {
						return "delall";
					}

			}

			if(preg_match($linecolor,$currentline,$regexline)){


					$correction = substr($currentline, 0, stripos($currentline, $regexline[2]) -1).')';
					
					return $correction;

			}
		
		return "nothing";

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
			

			
	
						if(iscoloredtotal($currentline) == "delall"){

							//effacement total
							$currentline = "";
							
							}elseif (iscoloredtotal($currentline) != "nothing") {
								
								$currentline = iscoloredtotal($currentline)."\n";

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