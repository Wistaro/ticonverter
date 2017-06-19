<?php

	
	$source_code = $_SESSION['src_conv'];
	include_once "libAdriweb/src/autoloader.php";
	include_once "libAdriweb/src/TypeHandlers/TH_0x05.php";
	
	use tivars\TIModel;
	use tivars\TIVarFile;
	use tivars\TIVarType;
	use tivars\TIVarTypes;
	$id_test = uniqid();


	$newPrgm = TIVarFile::createNew(TIVarType::createFromName("Program"), $_SESSION['filename'], TIModel::createFromName("84+"));
	$newPrgm->setContentFromString($source_code);
	$newPrgm->saveVarToFile("exported", $_SESSION['filename']);

	$getNewInfos = TIVarFile::loadFromFile('exported/'.$_SESSION['filename'].'.8xp');
	$sizeNewProgram = $getNewInfos->size();

	echo '<b>Taille du programme exporté:</b> '.$sizeNewProgram.' octets<br /><br />';
	 if($_SESSION['uploadMode'] == 'file'){ ?><b>Gain taille: </b> <?=ceil(100*($_SESSION['sizeOfPrgm']/$sizeNewProgram)); ?> % <span class="imginter"><img src="template/img/int.png" alt="howto" width="20" title="Ratio entre le programme de base et le programme convertit" height="20" class="imginter" id="imginter"/></span><br /><br /> <?php } 

	echo '<a href="exported/'.$_SESSION['filename'].'.8xp">Télécharge le programme</a>';




?>