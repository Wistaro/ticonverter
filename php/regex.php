<?php

	$linecolor = '#^Lig?ne\(([0-9A-Z+*-\/]+\,){4}([A-Za-z \n]{3,8})#i'; //is line colored 


	$ptoncolor = '#^Pt-(On|Aff)\(([0-9A-Z+-]+\,){2}([0-9A-Z+-]+\,)?([a-zA-Z\s]+)\)#i'; //is pt colored

	$horizcolor = '#^horizontale?\s([0-9A-Z*+-\/]+\,)?([A-Za-z- \n]{3,8})#i'; //is horizontal colored

    $verticcolor = '#^Verticale?\s([0-9A-Z*+-\/]+\,)?([A-Za-z- \n]{3,8})#i'; //is vertical colored

	$textcolor = '#^Texte?\(([0-9A-Z-+]+\,){2}"[\w \s-+*\/\\\.]+"\,[A-Z\s]{3,8}#i'; //is text colored

	$pxlcolor = '#^Pxl-(Aff|On)\(([0-9A-Z+-]+\,){2}[A-Z\s]{3,8}#i'; //is pxl colored

   // $ptchangecolor'#^Pt-changer?\(([0-9A-Z+-])+\,){2}([0-9A-Z+-]+\,)?[A-Z\s]{3,8}#i'; //is ptchange colored

		




	$arraycolor = array('BLUE', 'RED', 'BLACK', 'MAGENTA', 'GREEN', 'ORANGE', 'BROWN', 'NAVY', 'LTBLUE', 'YELLOW', 'WHITE', 'LTGREY', 'MEDGRAY', 'GRAY', 'DARKGREY', 'BLEU', 'ROUGE', 'NOIR', 'VERT', 'BLEU RMN', 'BLEU CLR', 'JAUNE', 'BLANC', 'GRIS CLR', 'GRIS MOY', 'GRIS', 'GRIS FON');


	
/*
	preg_match($ptoncolor, "Pt-Aff(10,10,White)", $rendu);

	
		if(!empty($rendu[0])){

			preg_match("#^[\,]([a-zA-Z0-1]+)#i", $rendu[count($rendu)-1],$rendu1);
			
	}
	

	echo print_r($rendu1);
	//print_r($rendu1);
	

				if(isset($rendu[count($rendu)-1]) and isset($rendu1[1])){

							echo 'Couleur = '.substr($rendu[count($rendu)-1], 1);



				}else{


							echo 'Non spécifiée';
				}


			

*/

	
?>