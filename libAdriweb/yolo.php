<?php
			require('../head.php');

		?>

	<section class="SEC_main">
		<h1>Title</h1>
		
			

<p>
<?php
include_once "src/autoloader.php";

use tivars\TIVarFile;
use tivars\TIVarType;
use tivars\TIVarTypes;

$testPrgm = TIVarFile::loadFromFile('testData/ProtectedProgram_long.8xp');
$sourceFR = $testPrgm->getReadableContent(['lang' => 'en']);

echo str_replace('\\n', '<br />', $sourceFR);
$gcode = explode("\n", $sourceFR);




/*	foreach ($gcode as $key => $value) {
		echo 'ligne='.$key.' et '.$value.'<br />';

	} */


?>
</p>
<?php

	require('../footer.php');