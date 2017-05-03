<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>TI-Convertisseur</title>
  <link rel="stylesheet" href="template/css/style.css">
</head>
<body>

	<menu>

		<div class="menu">
			<ul>
				<li class="itemmenu"><a href="index.php">Accueil</a></li>
				<li class="itemmenu"><a href="createCourseGUI.php">Générateur de cours</a></li>
				<li class="itemmenu"><a href="calc_coord.php">Conversion manuelle</a></li>
				<li class="itemmenu"><a href="about.php">A propos</a></li>

			</ul>

		</div>


	</menu>
	

	<section class="SEC_main">
		<h1>Générateur de cours</h1>
		
			<p class="infos">Ce logiciel vous permettre de générer du cours directement dans votre calculatrice.<br >
			Suivez simplement les étapes et laissez-vous guider par le tutoriel.<br /><br /><br />
			<button onclick="start()" class="buttonStart">Démarrer la création de mon cours!</button>

			</p>

			<div class="nameOfPrgm"></div><br />

			<div class="step2"></div>

			<div class="buttonGenerate"></div>



	</section>

	
		<script type="text/javascript" src="js/courseGenerator.js"></script>
		 <script src="https://tiplanet.org/scripts/z80text/FileSaver.js" async></script>
	    <script src="https://tiplanet.org/scripts/z80text/tivars_test.js" async></script>
	     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

</html>