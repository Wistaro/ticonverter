<<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
	<title></title>
</head>
<body>
<?php

include("php/converter.class.php");
$file = new Converter("Disp Toto\nLine(10,20,30,40,0)\n1→∆X:1→Y\nText(10,10,\"totofaitdu velo\")\n");
echo "<textarea>".$file->getSrc()."</textarea>";


$file->GetTypeOfDefinitionScreen();
$result = $file->MonoToColor();


echo '<textarea>'.$result.'</textarea>';


?>
</body>
</html>

