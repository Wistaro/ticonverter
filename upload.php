<?php

session_start();
	//defaults values?
	$_SESSION['src'] = "Une erreur est survenue lors de la lecture de votre fichier.";
	$_SESSION['lang'] = 'Anglais';
	$_SESSION['type'] = 'Monochrome - 83(+)/84(+)(SE)';
	$_SESSION['error_file_uploaded'] = 'ok';

	include_once "libAdriweb\src/autoloader.php";

				use tivars\TIVarFile;
				use tivars\TIVarType;
				use tivars\TIVarTypes;
	


$type = htmlspecialchars($_POST['type']);
$type2 = htmlspecialchars($_POST['type']);
$lang = htmlspecialchars($_POST['lang']);
$lang2 = htmlspecialchars($_POST['lang']);

	if($type == 'auto'){

		$type = '';

	}elseif ($type == 'color') {
	
		$type = 'Couleur - 83PCE/84+CE';

	}elseif ($type == 'mono') {

		$type = 'Monochrome - 83(+)/84(+)(SE)';
	}elseif ($type == '82') {

			$type="Monochrome - TI82Stats/82/76";
	}
		


if($_POST['upload'] == 'input'){

	//is upload from input

	
	$content = htmlspecialchars($_POST['code_input']);
	$_SESSION['src'] = $content;
	$_SESSION['lang'] = $lang2;
	$_SESSION['type'] = $type2;

	
	



}else{

	//is upload from converted file

	
	$ext_ok = array( '8xp' , '83p' , '84p' , '82p' );
	$dir = 'files/';

	if ($_FILES['fichier']['error'] == 0){


			$name_input = htmlspecialchars($_FILES['fichier']['name']);
			$id_saved = uniqid();


			$ext_file = strtolower(substr(strrchr($_FILES['fichier']['name'],'.'),1));

			$name_saved = $id_saved.'.'.$ext_file; //création d'un fichier unique

			$_SESSION['file'] == $name_saved;


			if (in_array($ext_file,$ext_ok) ){

						$result = move_uploaded_file($_FILES['fichier']['tmp_name'],$dir.$name_saved);

						if($result){


							 $testPrgm = TIVarFile::loadFromFile('files/'.$name_saved);
							 $global_src = $testPrgm->getReadableContent(['lang' =>  strtolower($lang2)]);
							

									
							 			$_SESSION['lang'] = $lang2;
										$_SESSION['type'] = $type2;
									    $_SESSION['src'] = $global_src;

									
						}

			}else{

				$_SESSION['error_file_uploaded']=  'Ce fichier n\'est pas un programme pour calculatrice TI';

			}




	}elseif($_FILES['fichier']['size'] == 0){


		$_SESSION['error_file_uploaded'] = 'Vous devez entrer un fichier!';

	}else{

		$_SESSION['error_file_uploaded'] = 'Le fichier contient des erreurs';


	}





}

header('location:verifbeforeconvert.php');