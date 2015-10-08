<?php
			require('head.php');

		?>

	<section class="SEC_main">
		<h1>GlobalTests</h1>


			<p>

				

			</p>
		
			<p>GlobalTest</p>

			<?php

			include_once "libAdriweb\src/autoloader.php";

				use tivars\TIVarFile;
				use tivars\TIVarType;
				use tivars\TIVarTypes;

	 $testPrgm = TIVarFile::loadFromFile('ressources/FRANCE.8xp');
	$toto = $testPrgm->getReadableContent(['lang' => 'fr']);
	//$myprgm = new converter($toto, 'input'); 



	//$toto = "Line(2A+3,5,999,88,Red)\nDisp A\nTextColor(RED)\nVerticale 999\nDisp \"Background On\"\nBackground On\nBackground Off\nDisp B+D\nBorderColor\nGraphColor RED\nLine(0,0,0,0)\nHorizontale 20,BLEU CMR\nVertical A+2, Navy\nText(0,0,\"dj++-956sfh//*sfhkjh\",BLEU CMR)\nPt-On(2,5,RED)\nPt-Aff(A+B/C,78,BLEU CMR)\nPxl-Aff(56,A+9-9*8,ORANGE)\n";

	

	function iscoloredtotal($currentline){

		include('php/regex.php');

	                   

		$totalcolor = array('Background', 'TextColor', 'CouleurTexte', 'ArrPlan', 'GraphColor', 'CouleurGraph', 'BorderColor', 'CouleurBord');

			for ($i=0; $i <=count($totalcolor)-1; $i++) { 
				
					if (preg_match('#^'.$totalcolor[$i].'#i', $currentline)) {
						return "delall";
					}

			}

			if(preg_match($linecolor,$currentline,$regexline)){ //lignes couleurs vers lignes monochromes


					$correction = substr($currentline, 0, stripos($currentline, $regexline[2]) -1).')';
					
					return $correction;

			}
			if(preg_match($horizcolor,$currentline,$regexhoriz)){ //horizontales couleurs vers horizontales monochromes


					
					$correction = substr($currentline, 0, stripos($currentline, $regexhoriz[count($regexhoriz)-1]) -1);
					
					return $correction;

			}
			if(preg_match($verticcolor,$currentline,$regexvertic)){ //verticales couleurs vers verticales monochromes


					
					$correction = substr($currentline, 0, stripos($currentline, $regexvertic[count($regexvertic)-1]) -1);
					
					return $correction;

			}
			if(preg_match($textcolor,$currentline,$regextext)){  //texte couleurs vers texte monochromes


					
					$correction = substr($currentline, 0, stripos($currentline, $regextext[count($regextext)-1]) -1).')';
					
					return $correction;

			}
			if(preg_match($ptoncolor,$currentline,$regexpt)){  //pton couleurs vers pton monochromes


					
					$correction = substr($currentline, 0, stripos($currentline, $regexpt[count($regexpt)-1]) -1).')';
					
					return $correction;

			}
			if(preg_match($pxlcolor,$currentline,$regexpxl)){  //pxlon couleurs vers pxlon monochromes


					
					$correction = substr($currentline, 0, stripos($currentline, $regexpxl[count($regexpxl)-1]) -1).')';
					
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


			echo '<textarea class="TTREA_code" id="TTREA_code">'.$toto2.'</textarea>';

			

	
	
	
	

	

	


			?>
			
				

	</section>

	<?php

	require('footer.php');