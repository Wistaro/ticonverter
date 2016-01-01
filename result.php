<?php
session_start();
if($_POST['sourcecode'] != $_SESSION['src']){

	$_SESSION['src'] = $_POST['sourcecode'];

}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>TI-Convertisseur</title>
  <link rel="stylesheet" href="template/css/style.css">
  <link rel="stylesheet" href="codemirror-5.6/lib/codemirror.css">
  <link rel="stylesheet" href="codemirror-5.6/theme/base16-dark.css">
</head>
<body>

	<menu>

		<div class="menu">
			<ul>
				<li class="itemmenu"><a href="/ticonvertisseur">Accueil</a></li>
				<li class="itemmenu"><a href="#">Documentation</a></li>
				<li class="itemmenu"><a href="#">Votre espace</a></li>
				<li class="itemmenu"><a href="#">A propos</a></li>

			</ul>

		</div>


	</menu>

	<section class="SEC_main">
		<h1>Conversion terminée!</h1>

		<p>La conversion de votre programme s'est bien déroulée. </p><hr><br />
		<?php

			include_once('end.php');
			require("footer.php");
		?>



