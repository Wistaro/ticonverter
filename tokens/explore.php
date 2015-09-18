<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>TI-Convertisseur</title>
  
</head>
<body>
<?php 
	
		
/*
$lang = "FR";

	if($lang == "FR"){

		$col1 = 5;
		$col2 = 6;

	}elseif ($lang == "EN") {
		
		$col1 = 4;
		$col2 = 5;

	}


$fichier = "tokens.csv";
$cpt = 0;
$fic = fopen($fichier, 'r+');

echo "<table border='1'>\n";

for ($ligne = fgetcsv($fic, 1024); !feof($fic); $ligne = fgetcsv($fic, 1024)) {

	$cpt++;

  echo "<tr>";

  $j = $col2;

  for ($i = $col1; $i < $j; $i++) {



    echo "<td>N°$cpt -  $ligne[$i]</td>";


    }

  echo "</tr>";

  }

echo "</table>\n";*/

include('../php/converter.class.php');
include('../tokens/tokens_array_type.php');

converter::get_function_readable("FR", 35);

	
foreach ($color_only as $value) {

		echo converter::get_function_readable("FR", $value).'<br />';

}






?>

</body>
</html>