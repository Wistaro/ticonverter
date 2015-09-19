<!DOCTYPE>
<html>
<head>
<meta charset="UTF-8" />
</head>
<body>
<?php

	require('php/converter.class.php');
	require('tokens/tokens_array_type.php');




       $prgm = new converter('ressources/sudoku_color.txt', 'EN');

      // echo $prgm->get_type_of_programm();

       foreach ($fr_only as $key => $value) {
       	
       		echo 'Token n°'.$key.'  = '.$value.'<br />';

       }
?>
</body>
</html>