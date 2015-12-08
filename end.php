<?php
	session_start();
	$sourcecode = $_POST['sourcecode']."\n";

	$typeexport = htmlspecialchars($_POST['type']);
	$converted_string = "";

include('php/converter.class.php');

	$file = new converter($sourcecode, $_POST['conversion'], $_SESSION['lang'],"Gest");

		if($_POST['conversion'] == 'Couleur - 83PCE/84+CE'){

				$converted_string = $file->MonoToColor();

		}elseif ($_POST['conversion'] == 'Monochrome - TI83(+)/84(+)(SE)') {

				$converted_string = $file->ColorToMono();

		}elseif($_POST['conversion'] == 'convert_none'){

				$converted_string = $file->getSrc();
		}



		if(htmlspecialchars($_POST['type']) == 'expt_text'){

			echo 'Votre code: <br /><textarea class="TTREA_code" id="TTREA_code" disabled>'.$converted_string.'</textarea>';

		}elseif (htmlspecialchars($_POST['type']) == 'expt_file') {

			$_SESSION['src_conv'] = $converted_string;
			
			include('export.php');

		}



