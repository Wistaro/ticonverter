<?php
			require('head.php');

		?>

	<section class="SEC_main">
		<h1>Test Adriweb's lib</h1>
		
			

<p>
<?php
include_once "libAdriweb\src/autoloader.php";

use tivars\TIVarFile;
use tivars\TIVarType;
use tivars\TIVarTypes;

$testPrgm = TIVarFile::loadFromFile('libAdriweb/testData/ProtectedProgram_long.8xp');
$sourceFR = $testPrgm->getReadableContent(['lang' => 'en']);

$test = str_replace('\\n', '<br />', $sourceFR);
echo $test;

//$test = nl2br($test);
$gcode = explode("\n", $sourceFR);
//echo $gcode[0];



//echo '<textarea name="code_input" placeholder="Saisissez votre code ici" class="TTREA_code" id="TTREA_code">'.$test.'</textarea> 





	/*foreach ($gcode as $key => $value) {
		echo 'ligne='.$key.' et '.$value.'<br />';

	} */


?>
</p>
<?php

	require('footer.php');