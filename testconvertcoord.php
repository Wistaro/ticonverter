<?php
			require('head.php');

		?>

	<section class="SEC_main">
		<h1>Title</h1>

		<?php

		//convert coordonate monocrome to color

			$code = "Line(5A+C,6,8,9)\n";

			$code = "Line(1,1,1,1)\nDisp A";
			$cal = new Converter($code);
			//echo $cal->read_line(1);
			echo '<br />';
			 convert_coord_mono_to_color($cal->read_line(1));



	function convert_coord_mono_to_color($code){	

			include('php/regex.php');

			preg_match($linesimple,$code,$test);

			$nb = count($test);
			$temp = "";
			$global = $test[1].'(';

			for ($i=2; $i < $nb ; $i++) { 

						
				if($i == 2 OR $i == 4){

						$temp = '('.$test[$i].')*2.81';
						$global = $global.$temp.',';
					
				}
				if($i == 3){

						$temp = '('.$test[$i].')*2.66';
						$global = $global.$temp.',';
					
				}
				if($i == 5){

						$temp = '('.$test[$i].')*2.66';
						$global = $global.$temp	;
					
				}

				

			}
			echo $global;

		}
					
					//$correction = substr($currentline, 0, stripos($currentline, $regextext[count($regextext)-1]) -1).')';
					
					

			






			
		?>			

	</section>

	

	require('footer.php');