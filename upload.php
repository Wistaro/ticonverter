<?php
//print_r($_POST);

$type = htmlspecialchars($_POST['type']);
$lang = htmlspecialchars($_POST['lang']);

if($type == 'auto'){

	$type = '';

}elseif ($type == 'color') {
	
	$type = 'Couleur - 83PCE/84+CE';

}elseif ($type == 'mono') {

	$type = 'Monochrome - 83(+)/84(+)(SE)';
}


if($_POST['upload'] == 'input'){

	$name = uniqid().'.txt';
	$fichier = fopen('files/'.$name, 'w+');

	fseek($fichier, 0);




	

	$content = $_POST['code_input'];

	$gcode = explode("\n", $content);

	foreach ($gcode as $key => $value) {
		echo 'ligne='.$key.' et '.$value.'<br />';

	}


	
	
	



}else{





}