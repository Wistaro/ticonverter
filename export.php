<?php

	session_start();
	if(isset($_SESSION['src'])){

		$source_code = $_SESSION['src'];

	}else{

	$source_code = "Disp \"Hello World\"";

	}

	include_once "libAdriweb\src/autoloader.php";
	include_once "libAdriweb\src/TypeHandlers/TH_0x05.php";
	
	use tivars\TIModel;
	use tivars\TIVarFile;
	use tivars\TIVarType;
	use tivars\TIVarTypes;
	$id_test = uniqid();


	$testData = tivars\TypeHandlers\TH_0x05::makeDataFromString($source_code);

	$goodTypeForCalc = TIVarFile::createNew(TIVarType::createFromName("Program"), "Bla", TIModel::createFromName("84+"));

	$goodTypeForCalc->setContentFromData($testData);

	$goodTypeForCalc->saveVarToFile("exported", $id_test);

	echo '<a href="exported/'.$id_test.'.82p">Download the program converted</a>';






?>