<?php
	
		/*Importing TI-Var Lib*/
		include_once "libAdriweb\src/autoloader.php";
		include_once "libAdriweb\src/TypeHandlers/TH_0x05.php";
	
		use tivars\TIModel;
		use tivars\TIVarFile;
		use tivars\TIVarType;
		use tivars\TIVarTypes;	

	session_start();

	/*Define some constants */

	define("MIN_PAS_Y", 12);
	define("MIN_PAS_X", 0);
	define("MAX_CHAR_LINE", 33);
	define("LAST_LINE", 13);


	if(isset($_POST['course_input']) AND !empty($_POST['course_input'])){

		$course = htmlspecialchars(trim($_POST['course_input']));
		$size = strlen($course);

		$Cptlines = 0;
		$YText = 0;
		$XText = 0;

		$outputString = '0→Xmin:0→Ymin:1→∆X:1→∆Y:AxesOff:BackgroundOff:ClrDraw:';

		for ($i=1; $i<=$size ; $i++) { 	

				if($i % MAX_CHAR_LINE == 0){
					
					
					$outputString.='Text('.$YText.','.$XText.',"'.substr($course, $Cptlines*MAX_CHAR_LINE, MAX_CHAR_LINE).'"):';
					$Cptlines++;
					$YText+=MIN_PAS_Y;
				}

				if($Cptlines == LAST_LINE){

					$outputString.='Pause :ClrDraw:';
					$YText = 0;
					$Cptlines = 0;


				}
			}

		$outputString.='Pause :ClrDraw:Disp " ';


		echo '<textarea>'.$outputString.'</textarea>';

		/*Generate 8xp File*/
		$id_course = uniqid();
		$name = "COURS";

		$newPrgm = TIVarFile::createNew(TIVarType::createFromName("Program"), $name, TIModel::createFromName("84+"));
		$newPrgm->setContentFromString($outputString);
		$newPrgm->saveVarToFile("generatedCourses", $id_course);

		/*Go back and give download link*/

		$_SESSION['error_course'] = '<br /><span style="color:green;">Votre fichier est disponible ici: <a href="generatedCourses/'.$id_course.'.8xp">Télécharger</a></span>';

		header('location: createCourse.php?mode=OK');



	}else{


		$_SESSION['error_course'] = '<span style="color:red;">Vous devez saisir un texte!</span>';

		header('location: createCourse.php');


	}














?>