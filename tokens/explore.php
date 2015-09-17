<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>TI-Convertisseur</title>
  <link rel="stylesheet" href="../template/css/style.css">
  <script src="../js/script.js"></script>
</head>
<body>

	<menu>

		<div class="menu">
			<ul>
				<li class="itemmenu"><a href="#">Accueil</a></li>
				<li class="itemmenu"><a href="#">Documentation</a></li>
				<li class="itemmenu"><a href="#">Votre espace</a></li>
				<li class="itemmenu"><a href="#">A propos</a></li>

			</ul>

		</div>
	</menu>

	<section class="SEC_main">
<?php 
$fichier = "tokens.csv";
$fic = fopen($fichier, 'r+');

echo "<table border='1'>\n";
for ($ligne = fgetcsv($fic, 1024); !feof($fic); $ligne = fgetcsv($fic, 1024)) {
  echo "<tr>";
  $j = 6;
  for ($i = 4; $i < $j; $i++) {



    echo "<td> $ligne[$i]</td>";


    }

  echo "</tr>";

  }

echo "</table>\n";

?>

</section>
</body>


</html>