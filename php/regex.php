<?php

	$linecolor = '#^Lig?ne\(([0-9A-Z+*-\/]+\,){4}([A-Za-z \n]{3,8})#i'; //is line colored

	$linesimple = '#^(Lig?ne)\(([0-9A-Z+*-\/]+)\,([0-9A-Z+*-\/]+)\,([0-9A-Z+*-\/]+)\,([0-9A-Z+*-\/]+)#i'; //is line colored 

	$linesimple2 = '#^(Lig?ne)\(([^,]+)\,([^,]+)\,([^,]+)\,([^,]+)(\,0)?#i'; //is line colored 



	$ptoncolor = '#^Pt-(On|Aff)\(([^,]+\,){2}([^,]+\,)?([a-zA-Z\s]+)#i'; //is pt colored

	$ptsimple2 = "#^(Pt-(On|Aff))\(([^,]+)\,([^,]+)(\,([^\)]+))?#i";  //pt simple to get coord

	$ptsimpleno = "#^(Pt-(Off|NAff))\(([^,]+)\,([^,]+)(\,([^\)]+))?#i";  //pt simple off to get coord

	$horizcolor = '#^horizontale?\s([0-9A-Z*+-\/]+\,)?([A-Za-z- \n]{3,8})#i'; //is horizontal colored

    $verticcolor = '#^Verticale?\s([0-9A-Z*+-\/]+\,)?([A-Za-z- \n]{3,8})#i'; //is vertical colored

	$textcolor = '#^Texte?\(([0-9A-Z*+-\/]+\,){2}"[\w \s-+*\/\\\.]+"\,([a-zA-Z\s]{3,8})#i'; //is text colored

	$pxlcolor = '#^Pxl-(Aff|On)\(([0-9A-Z*+-\/]+\,){2}([A-Za-z\s]{3,8})#i'; //is pxl colored

	$horiznocolor =	"#^(Horizontale?)\s([^,]+)#i";
	$vertinocolor =	"#^(Verticale?)\s([^,]+)#i";

	$ptchangecolor = "#^Pt-Changer?\([^,]+\,[^,]+\,([a-zA-Z\s]{3,8})#i";
	$ptchangenocolor = "#^(Pt-Changer?)\(([^,]+)\,([^,]+)#i";

    $pxonnocolor = "#^(Pxl-(On|Aff))\(([^,]+)\,([^,]+)#i";
    $pxoffnocolor = "#^(Pxl-(Off|NAff))\(([^,]+)\,([^,]+)#i";

    $pxlchangecolor = "#^Pxl-Changer?\([^,]+\,[^,]+\,([a-zA-Z\s]{3,8})#i";
    $pxlchangenocolor = "#^(Pxl-Changer?)\(([^,]+)\,([^,]+)#i";

    $textnocolor = "#^(Texte?)\((-1)?([^,]+)\,([^,]+)\,([\w\s\/\-\,\*\+\"\'\ʟ\(\):]+)#i";
    $cerclecolor = "#^C(i|e)rcle\([^,]+\,[^,]+\,[^,]+\,([a-zA-Z\s]{3,8})#i";

    $cerclenocolor = "#(C(i|e)rcle)\(([^,]+)\,([^,]+)\,([^,]+)#i";

    $pxtest = "#^(Pxl-Test)\(([^,]+)\,([^,]+)#i";
    $pxtestnobegin = "#^(Pxl-Test)\(([^,]+)\,([^,]+)#i";





   // $ptchangecolor'#^Pt-changer?\(([0-9A-Z*+-\/])+\,){2}([0-9A-Z*+-\/]+\,)?[a-zA-Z\s]{3,8}#i'; //is ptchange colored

		




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