<?php


		session_start();
		require('head.php');


		?>

	<section class="SEC_main">
		<h1>Générateur de cours</h1>
		
			<p>Ce logiciel vous permettre de générer du cours directement dans votre calculatrice.</p>

			<?php 
			if(empty($_GET)){ ?>

		<form method="post" action="generateCourse.php" enctype="multipart/form-data">

			<textarea name="course_input" placeholder="Tapez, ou collez simplement votre cours ici" rows="20" cols="100"></textarea>
			<br /><br />
			<label class="SELECT_type">Type : </label><select name="type">
						<option disabled value="Monochrome - TI83(+)/84(+)(SE)/82Advanced">Monochrome - TI83(+)/84(+)(SE)/82Advanced</option>
						<option value="Couleur - TI83PCE/84+CE">Couleur - TI83PCE/84+CE</option>
			</select>
			<br /><br />
			<input type="submit" value="Générer!" name="sendOK"/>
			
		</form>	
		<?php } ?>

		<div id="errorMessage"><?php if(isset($_SESSION['error_course'])) echo $_SESSION['error_course']; ?></div>

	</section>

	<?php

	$_SESSION['error_course'] = '';

	require('footer.php');