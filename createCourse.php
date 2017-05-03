<?php


		session_start();
		require('head.php');


		?>

	<section class="SEC_main">
		<h1>Générateur de cours</h1>
		
			<p>Ce logiciel vous permettre de générer du cours directement dans votre calculatrice.</p>

			<?php 
			if(empty($_GET)){ ?>

			<button onclick="insertMenu();">Ajouter un menu</button> <button onclick="insertChaptStart();">Ajouter un début de chapitre</button> <button onclick="insertChaptEnd();">Ajouter une fin de chapitre</button>


			<br /><textarea name="course_input" id="course_input" placeholder="Tapez, ou collez simplement votre cours ici" rows="20" cols="100"></textarea>
			<br /><br />
			<label class="SELECT_type">Type : </label><select name="type">
						<option disabled value="Monochrome - TI83(+)/84(+)(SE)/82Advanced">Monochrome - TI83(+)/84(+)(SE)/82Advanced</option>
						<option value="Couleur - TI83PCE/84+CE">Couleur - TI83PCE/84+CE</option>
			</select>
			<br /><br />
			<button onclick="generateCourse();">Générer!</button>
			
		
		<?php } ?>

		<div id="errorMessage"><?php if(isset($_SESSION['error_course'])) echo $_SESSION['error_course']; ?></div>

	</section>

	<?php

	$_SESSION['error_course'] = '';

	require('footer.php');
	?>

	<script type="text/javascript">

		var nbOptions = 0;

	function insertMenu(){

		var options = new Array();
		var menu_token = "#STARTMENU#\n$MENU TITLE$\nI-Name Option 1\nII-Name Option 2\nIII-Name Option 3\n#ENDMENU#"; //old and bad way to add a menu :( Better in JS 

		var menuName = prompt('Titre de votre menu?');

		addValue2Text('$Lbl 0\nMenu(\"'+menuName.toUpperCase()+'\"');

		 nbOptions = prompt('Nombre d\'options dans votre menu? (1 - 7)');

		if(nbOptions < 1 && nbOptions >7) nbOptions = 1;

		for (var i = 0; i<=nbOptions-1; i++) {

			options[i] = prompt('Option n°'+eval(i+1));

			addValue2Text(',\"'+options[i].toUpperCase()+'\",'+eval(i+1));
		}
		
		addValue2Text(")$\n");		
	}

	function insertChaptStart(){

		if(nbOptions > 0){

		var nbChapt = prompt('Numéro du chapitre? Entre 1 et '+nbOptions);
		addValue2Text("\n$Lbl "+nbChapt+"$\nVotre texte démarre ici!");

		}else{

			alert('Vous n\'avez pas créé de menu. Ajoutez-en un pour continuer!');

		}
	}
	function insertChaptEnd(){

		if(nbOptions > 0){

		addValue2Text("\nFin de ce chapitre!\n$Pause :ClrDraw:Goto 0$\n");

		}else{

			alert('Vous n\'avez pas créé de menu. Ajoutez-en un pour continuer!');

		}
	}

	function addValue2Text(text2write){

		var courseInput = document.getElementById('course_input');
	
		courseInput.focus();

		if(courseInput.selectionStart != undefined) {
			courseInput.value = courseInput.value.substring(0, courseInput.selectionStart) + text2write + courseInput.value.substring(courseInput.selectionEnd, courseInput.value.length);
		}


	}

	function generateCourse(){

		const MIN_PAS_Y = 12;
		const MIN_PAS_X = 0;
		const MAX_CHAR_LINE = 33;
		const LAST_LINE = 13;

		var newCourse = "0→Xmin:0→Ymin:1→∆X:1→∆Y:AxesOff:BackgroundOff:ClrDraw\n";


		var courseInput = document.getElementById('course_input');
		courseInput.focus();
		var courseInputOld = courseInput.value;


		//fill old code
		courseInput.value = '';




		

		courseInput.value = newCourse;

	}

	</script>