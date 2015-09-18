<?php
	if(isset($_GET['mode'])){
			$mode = htmlspecialchars($_GET['mode']);
	}else{
			$mode = "";
	}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>TI-Convertisseur</title>
  <link rel="stylesheet" href="template/css/style.css">
  <link rel="stylesheet" href="codeMirror-5.6/lib/codemirror.css">
  <link rel="stylesheet" href="codeMirror-5.6/theme/3024-night.css">
  <script src="js/script.js"></script>
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
		<h1>Convertisseur multi-TI</h1>
		<form method="post" action="" enctype="multipart/form-data">
	
			<?php if(isset($_GET['mode']))
			{
				if($_GET['mode'] == "upload") { ?>
	
					<input type="file" name="fichier" id="fichier" name="fichier"/><br /><br />
					<input type="submit" action="envoyer" class="BT_send" />
	
				<?php } elseif($_GET['mode'] == "input") { ?>
	
					<textarea name="code_input" placeholder="Saisissez votre code ici" class="TTREA_code" id="TTREA_code">If A=5</textarea> 
					<input type="submit" action="envoyer" class="BT_send" />
			
			<?php } } else { ?>

				<p></p>

			<?php } ?>
	
		</form>
	</section>

	<script src="codeMirror-5.6/lib/codemirror.js"></script>
	<script src="codeMirror-5.6/mode/tibasic/tibasic.js"></script>
	<script src="codeMirror-5.6/addon/selection/active-line.js"></script>
	<script type="text/javascript">
		var editor = CodeMirror.fromTextArea(document.getElementById("TTREA_code"), {
			mode: "tibasic",
			styleActiveLine: true,
			lineNumbers: true,
			theme: "3024-night"
		});
	</script>
</body>
</html>
