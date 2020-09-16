
		/*Course Generator V1.0		
			Authors: Wistaro (main program)
					 Adrien "Adriweb" Bertrand (TI_var_lib_ccp)

			Help: tiplanet.org

		*/

		var newCourse = "0→Xmin:0→Ymin:1→∆X:1→∆Y:AxesOff:BackgroundOff:ClrDraw:Trace:\n";
		var step = 0;
		var isMenu = 0;
		var options = new Array();
		var nbOptions = 0;
		var goGen = 0;



		function start(){

			step = 1;

			$('.nameOfPrgm').fadeIn(500).html('<input id="prgmName" type="text" pattern="^[a-zA-Z0-9]$" title="Title" value="NOM" required/><br/>');

			 if (confirm("Désirez-vous un menu dans votre programme? Oui = [OK], Non = [Annuler]")) isMenu = 1;
			  

			  if(isMenu == 1){

			  	isMenu = 1;

			  	var menuName = prompt('Titre de votre menu?');
			  	nbOptions = prompt('Nombre d\'options dans votre menu? (1 - 6)');
			  	if(nbOptions < 1 || nbOptions > 6){ nbOptions = 1 } ;

			  	newCourse += '\nLbl 0\nMenu(\"'+menuName.toUpperCase()+'\"';

			  	for (var i = 0; i<=nbOptions-1; i++) {

						options[i] = prompt('Option n°'+eval(i+1));

						newCourse+=',\"'+options[i].toUpperCase()+'\",'+eval(i+1);

						$('.step2').fadeIn(1000).append('<textarea id="'+i+'" class="courseText" rows="15" cols="60">Votre cours, partie '+eval(i+1)+'! </textarea><br />');
					}
				
				$('.buttonStart').fadeOut(100);
				$('.buttonGenerate').html('<br /><br /><button onclick="generateCourse();">Générer mon cours!</button>');

				$('.infos').html('Vous pouvez maintenant taper votre cours dans chaque partie puis cliquer sur générer.');

				newCourse+=",\"Quitter\",Q\n";

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

				if(isMenu == 1){
					inputStr = $('#'+j).val();
					newCourse+="Lbl "+eval(j+1)+"\n";

				}else{
					inputStr = $('#1').val();

				}		

				inputStr = inputStr.replace(/\"/g, "''");	//replacing ""
				inputStr = inputStr.replace(/\n/g, "                              "); //replacing return	
				inputStr = inputStr.replace(/→/g, "->");	//replacing arrow
				inputStr = inputStr.replace(/ /g, "  "); //spaces more agreables on the screen

				const MIN_PAS_Y = 12;
				const MIN_PAS_X = 0;
				const MAX_CHAR_LINE = 33;
				const LAST_LINE = 13;

				var Cptlines = 0;
				var CptlinesSave = 0;
				var CptPages = 1;
				var YText = 0;
				var XText = 0;

				newCourse+="\n0→V\n";

				var currentSubStr = String;

				for (var i = 0; i <= inputStr.length - 1; i++) {

				  if (!(i%MAX_CHAR_LINE)) {

				  	currentSubStr = inputStr.substring(i, i + MAX_CHAR_LINE);

				  	/*FILTERING*/
				  	//currentSubStr = currentSubStr.replace("\"","''");
				  	//currentSubStr = filter(currentSubStr);

				    //newCourse+= "Text(" + YText + "," + XText + ",\"" + currentSubStr + "\n"
				    newCourse+= "\"" + currentSubStr + "\nprgmZTEXT\n"
				    Cptlines++;
				    CptlinesSave++;
				    YText += MIN_PAS_Y;
				  }
				  if (Cptlines == LAST_LINE) {
				    newCourse+= "Pause :ClrDraw:0→V\n";
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

			newCourse+="\nLbl Q\nClrDraw:Disp \"";
			var titlePrgm = $('#prgmName').val();
			//newCourse+="\n\"      Titre:"+titlePrgm+"→Y₁\n";



			$('.step2').fadeOut(500);
			$('.buttonGenerate').fadeOut(500);
			$('.nameOfPrgm').fadeOut(500);
			$('.infos').html('Génération en cours...<img class="loaderCourse" src="http://www.vilebrequin.com/on/demandware.static/Sites-VBQ-EU-Site/-/default/dw64ea6765/images_active/spinner.gif" alt="loader" width="80" height="80" />');

			/*STARTING GENERATION*/

			

			create8xpFile(titlePrgm,newCourse);
			$('.infos').html('<b>Fichier généré . <br />N\'oublie pas d\'installer également le fichier "ZTEXT" sur ta calculatrice! <i>(disponible ici: <a href="ressources/ZTEXT.8xp">Télécharger</a>)</i><br /><br /></b>Merci d\'utiliser nos services!<br /><br /><a href="createCourseGUI.php">Générer un nouveau cours</a>');
			


			/*END OF GENERATION*/

		}

	function addValue2Text(text2write){

		var courseInput = document.getElementById('course_input');
	
		courseInput.focus();

		if(courseInput.selectionStart != undefined) {
			courseInput.value = courseInput.value.substring(0, courseInput.selectionStart) + text2write + courseInput.value.substring(courseInput.selectionEnd, courseInput.value.length);
		}


	}


	function create8xpFile(title,programm){

		const TIVarFile = Module['TIVarFile'];
        const TIVarType = Module['TIVarType'];
        const TIModel   = Module['TIModel'];

        const name = title;
        const txt = unescape(encodeURIComponent(programm)); // encoding issues...

       /* const options = new Module['options_t']();
        options.set('useShortestTokens', 1);*/

        const prgm = TIVarFile.createNew(TIVarType.createFromName("Program"), name, TIModel.createFromName("84+"));
        prgm.setContentFromString(txt);
        prgm.saveVarToFile("", name);

        const fileName = name + ".8xp";

        const file = FS.readFile(fileName, {encoding: 'binary'});
        if (file) {
            const blob = new Blob([file], {type: 'application/octet-stream'});
            window['saveAs'](blob, fileName);
        } else {
            alert('Oops, something went wrong retrieving the generated .8xp file :(');
        }





	}

	function filter(toBeFiltered){





	}
