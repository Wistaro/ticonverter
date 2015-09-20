<!DOCTYPE>
<html>
<head>
<meta charset="UTF-8" />
</head>
<body>
<?php

	require('php/converter.class.php');
	require('tokens/tokens_array_type.php');




       $prgm = new converter('ressources/sudoku_color.txt', 'FR');

      // echo $prgm->get_type_of_programm();

       foreach ($fr_only as $key => $value) {
       	
       		echo 'Token n°'.$key.'  = '.$prgm->get_function_readable($value).' (ID: '.$value.') <br />';

       }
?>
</body>
</html>