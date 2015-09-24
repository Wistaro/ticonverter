<?php

	$linecolor = '#^(Line|Ligne)\(+[a-zA-Z0-9_.-]+,[a-zA-Z0-9_.-]+,[a-zA-Z0-9_.-]+,[a-zA-Z0-9_.-]+,[a-zA-Z]#i'; //is line color 
		
	$ptoncolor = '#^(Pt-On|Pt-Aff)\(+[a-zA-Z0-9_.-]+,[a-zA-Z0-9_.-]+[a-zA-Z0-9_.-]?+,#i';



		if(preg_match($ptoncolor, "Pt-On(127,72,99,)")){

			echo 'YES!';

		}
?>