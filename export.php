<?php

	
	$source_code = $_SESSION['src_conv'];
	include_once "libAdriweb\src/autoloader.php";
	include_once "libAdriweb\src/TypeHandlers/TH_0x05.php";
	
	use tivars\TIModel;
	use tivars\TIVarFile;
	use tivars\TIVarType;
	use tivars\TIVarTypes;
	$id_test = uniqid();


	$newPrgm = TIVarFile::createNew(TIVarType::createFromName("Program"), "CONVERT", TIModel::createFromName("84+"));
	$newPrgm->setContentFromString($source_code);
	$newPrgm->saveVarToFile("exported", $id_test);

	echo '<a href="exported/'.$id_test.'.8xp">Telecharge le programme</a>';






?>