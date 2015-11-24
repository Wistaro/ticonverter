<?php
			session_start();
			require('head.php');
			require('php/regex.php');


			


			
		
			
		?>

	<section class="SEC_main">
		<h1>Convertisseur rapide debug</h1><?php

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
		header('location:export.php');
	

		echo 'Après correction couleur--mono: <textarea rows="10" cols="50">'.$prgm->ColorToMono().'</textarea><br /><br />';
		}


		?>
			

	</section>

	<?php

	require('footer.php');