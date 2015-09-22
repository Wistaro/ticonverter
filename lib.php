<?php
			require('head.php');

		?>

	<section class="SEC_main">
		<h1>Test Adriweb's lib</h1>
		
			

<p>
<?php

/*
*
* ONLY TESTS HERE
*
*
*
*/
include_once "libAdriweb\src/autoloader.php";

use tivars\TIVarFile;
use tivars\TIVarType;
use tivars\TIVarTypes;

$testPrgm = TIVarFile::loadFromFile('libAdriweb/testData/ProtectedProgram_long.8xp');
$sourceFR = $testPrgm->getReadableContent(['lang' => 'en']);


function linesofprgm($source, $type){

	if($type == 'input'){

				return substr_count($source, "\n");



		}elseif ($type == 'file') {
			
				$rpl = str_replace('\\n', '<br />', $source);
				return substr_count($rpl, "<br />")+1;

		}



}





function get_line($line, $source, $type){

		if($type == 'input'){

				$gcode = explode("\n", $source);

		}elseif ($type == 'file') {
			
				$rpl = str_replace('\\n', '<br />', $source); //on transforme provisoirement les \n en <br />, car les \n ne sont pas détecté par la suite par le explode..???
				$gcode = explode("<br />", $rpl);

		}

		

	return $gcode[$line-1];
}

	for ($i=1; $i <= linesofprgm($sourceFR, 'file'); $i++) { 

		echo get_line($i, $sourceFR, 'file').'<br />';
	} 



















//$test = nl2br($test);

//echo $gcode[0];



//echo '<textarea name="code_input" placeholder="Saisissez votre code ici" class="TTREA_code" id="TTREA_code">'.$sourceFR.'</textarea>';





	/*foreach ($gcode as $key => $value) {
		echo 'ligne='.$key.' et '.$value.'<br />';

	} */


?>
</p>
<?php

	require('footer.php');