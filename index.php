<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>TI-Convertisseur</title>
  <link rel="stylesheet" href="template/css/style.css">
  <script src="js/script.js"></script>
</head>
<body>

	<menu>

		<div class="menu">
			<ul>
				<li class="itemmenu">Accueil</li>
				<li class="itemmenu">Documentation</li>
				<li class="itemmenu">Votre espace</li>
				<li class="itemmenu">A propos</li>

			</ul>

		</div>
	</menu>

	<h1>Convertisseur multi-TI</h1>
	<form method="post" action="" enctype="multipart/form-data">

		<input type="file" name="fichier" id="fichier" name="fichier"/><br /><br />
		<p>Ou </p>
 		<textarea name="code_input" cols="70" rows="30" placeholder="Saisissez votre code ici"></textarea> 

 		<input type="submit" action="envoyer" />
 	</form>
</body>
</html>