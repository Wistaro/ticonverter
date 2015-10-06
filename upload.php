<?php
session_start();
	//defaults values?
	$_SESSION['src'] = 'Disp \"Hello World\"\n';
	$_SESSION['lang'] = 'Anglais';
	$_SESSION['type'] = 'Monochrome';
	$_SESSION['error_file_uploaded'] = 'ok';
	


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



			$ext_file = strtolower(substr(strrchr($_FILES['fichier']['name'],'.'),1));

			$name_saved = uniqid().'.'.$ext_file; //création d'un fichier unique


			if (in_array($ext_file,$ext_ok) ){

						$result = move_uploaded_file($_FILES['fichier']['tmp_name'],$dir.$name_saved);

						if($result){

									

									//conversion avec le detokeniser, puis stockage dans une variable.

									$_SESSION['src'] = $content;
									$_SESSION['lang'] = $lang2;
									$_SESSION['type'] = $type2;
									$_SESSION['src'] = 'Disp "Hello World"';

									




						}

			}else{

				$_SESSION['error_file_uploaded']=  'Ce fichier n\'est pas un programme pour calculatrice TI';

			}




	}else{


		$_SESSION['error_file_uploaded'] = 'Le fichier contient des erreurs';

	}





}

header('location:verifbeforeconvert.php');