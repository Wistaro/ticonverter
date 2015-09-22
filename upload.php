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

	
	$content = $_POST['code_input'];


	function linesofprgm($source, $type){

	if($type == 'input'){

				return substr_count($source, "\n");



		}elseif ($type == 'file') {
			
				$rpl = str_replace('\\n', '<br />', $source);
				return substr_count($rpl, "<br />")+1;

		}



}





function get_line($line, $source, $type){

		if($type == 'input'){

				$gcode = explode("\n", $source);

		}elseif ($type == 'file') {
			
				$rpl = str_replace('\\n', '<br />', $source); //on transforme provisoirement les \n en <br />, car les \n ne sont pas détecté par la suite par le explode..???
				$gcode = explode("<br />", $rpl);

		}

		

	return $gcode[$line-1];
}	
	

for ($i=1; $i <= linesofprgm($content, 'input'); $i++) { 

		echo get_line($i, $content, 'input').'<br />';
	} 


	
	
	



}else{





}