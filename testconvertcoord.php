<?php
			session_start();
			require('head.php');
			require('php/regex.php');

		?>

	<section class="SEC_main">
		<h1>Convertisseur rapide debug</h1><?php

		/*$test = "Pt-Off(10,10)";
		preg_match($ptsimpleno,$test,$res);
		echo '<pre>';
		echo print_r($res);
		echo '</pre>';
		if(count($res)>=5){

			echo 'Valeur corrigée = '.substr($res[4],0,(strlen($res[4])-1));

		}*/
?>

<br /><br /><br /><hr>
		<?php

			$string = "TextColor(Red)\nLine(A+BI,2,3,4,Red\nDisp T\nLine(10,15,26,21\nLine(A+2,B*98,JK,0\n";

		?>
		<form method="post" action="">

			<textarea name="inputtest" rows="10" cols="25" placeholder="Code de test à convertir"><?php if(isset($_POST['sub'])){echo $_POST['inputtest'];} ?></textarea>
			<input type="submit" name="sub" value="convertir :)">
		</form>

		<?php

			if(isset($_POST['sub'])){



		$prgm = new Converter($_POST['inputtest']."\n");
		$_SESSION['src'] = $prgm->ColorToMono();
		//header('location:export.php');

		



/*
$testData = tivars\TypeHandlers\TH_0x05::makeDataFromString("Disp Toto");

$goodTypeForCalc = TIVarFile::createNew(TIVarType::createFromName("Program"), "Bla", TIModel::createFromName("84+"));

$goodTypeForCalc->setContentFromData($testData);

$goodTypeForCalc->saveVarToFile("/", "trololol");
*/
		

		echo 'Après correction couleur--mono: <textarea rows="10" cols="50">'.$prgm->ColorToMono().'</textarea><br /><br />';
		}



			
					//$correction = substr($currentline, 0, stripos($currentline, $regextext[count($regextext)-1]) -1).')';
					
					

			






			
		?>			

	</section>

	

	require('footer.php');