
		var newCourse = "0→Xmin:0→Ymin:1→∆X:1→∆Y:AxesOff:BackgroundOff:ClrDraw:";
		var step = 0;
		var isMenu = 0;
		var options = new Array();
		var nbOptions = 0;


		function start(){

			step = 1;

			$('.nameOfPrgm').fadeIn(500).html('<input id="prgmName" type="text" pattern="^[a-zA-Z0-9]$" title="Title" value="NOM" required/><br/>');

			 if (confirm("Désirez-vous un menu dans votre programme? Oui = [OK], Non = [Annuler]")) isMenu = 1;
			  

			  if(isMenu == 1){

			  	isMenu = 1;

			  	var menuName = prompt('Titre de votre menu?');
			  	nbOptions = prompt('Nombre d\'options dans votre menu? (1 - 7)');
			  	if(nbOptions < 1 && nbOptions >7) nbOptions = 1;

			  	newCourse += '\nLbl 0\nMenu(\"'+menuName.toUpperCase()+'\"';

			  	for (var i = 0; i<=nbOptions-1; i++) {

						options[i] = prompt('Option n°'+eval(i+1));

						newCourse+=',\"'+options[i].toUpperCase()+'\",'+eval(i+1);

						$('.step2').fadeIn(1000).append('<textarea id="'+i+'" class="courseText" rows="15" cols="60">Votre cours, partie '+eval(i+1)+'! </textarea><br />');
					}
				
				$('.buttonStart').fadeOut(100);
				$('.buttonGenerate').html('<br /><br /><button onclick="generateCourse();">Générer mon cours!</button>');

				$('.infos').html('Vous pouvez maintenant taper votre cours dans chaque partie puis cliquer sur générer.');

				newCourse+=")\n";


			  }else{

			  	nbOptions = 1;
			  	isMenu = 0;

			  	$('.step2').fadeIn(1000).append('<textarea id="1" class="courseText" rows="15" cols="60">Votre cours </textarea><br />');
			  	$('.buttonGenerate').html('<br /><br /><button onclick="generateCourse();">Générer mon cours!</button>');
				$('.infos').html('Vous pouvez maintenant taper votre cours puis cliquer sur générer.');


			  }

		}



		function generateCourse(){

			var inputStr = new String;

			for(var j = 0; j<=nbOptions-1;j++){

				//var inputStr = "idtLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumrdhtrdtrdtrdtrdtrdhtrdtrdtrdtrdatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum";

				if(isMenu == 1){
					inputStr = $('#'+j).val();

				}else{
					inputStr = $('#1').val();

				}
				

				const MIN_PAS_Y = 12;
				const MIN_PAS_X = 0;
				const MAX_CHAR_LINE = 33;
				const LAST_LINE = 13;

				var Cptlines = 0;
				var CptlinesSave = 0;
				var CptPages = 1;
				var YText = 0;
				var XText = 0;

				for (var i = 0; i <= inputStr.length - 1; i++) {

				  if (!(i%MAX_CHAR_LINE)) {
				    newCourse+= "Text(" + YText + "," + XText + ",\"" + inputStr.substring(i, i + MAX_CHAR_LINE) + "\n"
				    Cptlines++;
				    CptlinesSave++;
				    YText += MIN_PAS_Y;
				  }
				  if (Cptlines == LAST_LINE) {
				    newCourse+= "Pause :ClrDraw\n";
				    YText = 0;
				    Cptlines = 0;
				    CptPages++;
				  }

				}

				if(isMenu == 1){
					newCourse += "Pause :ClrDraw\nGoto 0\n";
				}else{
					newCourse += "Pause :ClrDraw\nDisp \"";
				}

			}

			alert(newCourse);
			$('.step2').fadeOut(500);
			$('.buttonGenerate').fadeOut(500);
			$('.nameOfPrgm').fadeOut(500);
			$('.infos').html('Génération en cours...<img class="loaderCourse" src="http://www.vilebrequin.com/on/demandware.static/Sites-VBQ-EU-Site/-/default/dw64ea6765/images_active/spinner.gif" alt="loader" width="80" height="80" />');

			/*STARTING GENERATION*/

			const TIVarFile = Module['TIVarFile'];
	        const TIVarType = Module['TIVarType'];
	        const TIModel   = Module['TIModel'];

	        const name = $("#prgmName").val();
	        const txt = unescape(encodeURIComponent(newCourse)); // encoding issues...

	        const prgm = TIVarFile.createNew(TIVarType.createFromName("Program"), name, TIModel.createFromName("84+"));
	        prgm.setContentFromString(txt);
	        prgm.saveVarToFile("generatedCourses", name);

	        const fileName = name + ".8xp";

	        const file = FS.readFile(fileName, {encoding: 'binary'});
	        if (file) {
	            const blob = new Blob([file], {type: 'application/octet-stream'});
	            window['saveAs'](blob, fileName);
	            $('.infos').html('Génération terminée! Votre fichier est disponible au téléchargement en cliquant <a href="generatedCourses/'+fileName+'">ici</a>');

	        } else {
	            alert('Oops, something went wrong retrieving the generated .8xp file :(');
	            $('.infos').html('Echec lors de la génération du fichier. Veuillez réessayer ou contactez l\'équipe.');
	        }


			/*END OF GENERATION*/

		}


	function addValue2Text(text2write){

		var courseInput = document.getElementById('course_input');
	
		courseInput.focus();

		if(courseInput.selectionStart != undefined) {
			courseInput.value = courseInput.value.substring(0, courseInput.selectionStart) + text2write + courseInput.value.substring(courseInput.selectionEnd, courseInput.value.length);
		}


	}

