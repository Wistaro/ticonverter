<?php

session_start();
	
	/*Default values*/
	$_SESSION['src'] = "Une erreur est survenue lors de la lecture de votre fichier.";
	
	$_SESSION['lang'] = 'Anglais';
	$_SESSION['type'] = 'Monochrome - 83(+)/84(+)(SE)';
	$_SESSION['error_file_uploaded'] = 'ok';

	/* Load Tivar-lib, by Adriweb */
	include_once "libAdriweb/src/autoloader.php";
	use tivars\TIVarFile;
	use tivars\TIVarType;
	use tivars\TIVarTypes;
	

	/* get users informations */
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
	$_SESSION['filename'] = substr(strtoupper($_POST['filename']),0,8);
	 $_SESSION['filename']= preg_replace('#[^[:alnum:]]#u', '',  $_SESSION['filename']);
	$_SESSION['uploadMode'] = 'input';

	



}else{

	//is upload from converted file

	
	$ext_ok = array( '8xp' , '83p' , '84p' , '82p' );
	$dir = 'files/';

	if ($_FILES['fichier']['error'] == 0){


			$name_input = htmlspecialchars($_FILES['fichier']['name']);
			//$_SESSION['filename'] = substr($name_input, 0, -4);
			$id_saved = uniqid();


			$ext_file = strtolower(substr(strrchr($_FILES['fichier']['name'],'.'),1));

			$name_saved = $id_saved.'.'.$ext_file; //création d'un fichier unique

			$_SESSION['file'] == $name_saved;


			if (in_array($ext_file,$ext_ok) ){

						$result = move_uploaded_file($_FILES['fichier']['tmp_name'],$dir.$name_saved);

						if($result){

							 /*If ok, updating vars*/
							 $testPrgm = TIVarFile::loadFromFile('files/'.$name_saved);

							 $_SESSION['test'] = $testPrgm->getHeader();


							 $global_src = $testPrgm->getReadableContent(['lang' =>  strtolower($lang2)]);
													
							 $_SESSION['uploadMode'] = 'file';						
							 $_SESSION['lang'] = $lang2;
							 $_SESSION['type'] = $type2;
							 $_SESSION['src'] = $global_src;
							 $_SESSION['sizeOfPrgm'] = $testPrgm->size();

							 $tempName = substr($_FILES['fichier']['name'],0,stripos($_FILES['fichier']['name'],'.'));

							 $_SESSION['filename'] = substr(strtoupper($tempName),0,8);

							 $_SESSION['filename']= preg_replace('#[^[:alnum:]]#u', '',  $_SESSION['filename']);

							
									
						}

			}else{

				$_SESSION['error_file_uploaded']=  'Ce fichier n\'est pas un programme pour calculatrice TI';

			}




	}elseif($_FILES['fichier']['size'] == 0){

		//empty file
		$_SESSION['error_file_uploaded'] = 'Vous devez entrer un fichier!';

	}else{
		//errors in uploaded file
		$_SESSION['error_file_uploaded'] = 'Le fichier contient des erreurs';


	}





}

header('location:verifbeforeconvert.php');