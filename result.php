<?php
session_start();
if($_POST['sourcecode'] != $_SESSION['src']){

	$_SESSION['src'] = $_POST['sourcecode'];

}
include 'head.php';
?>


	<section class="SEC_main">
		<h1>Conversion terminée!</h1>

		<p>La conversion de votre programme s'est bien déroulée. </p><hr><br />
		<?php

			include_once('end.php');
			require("footer.php");
		?>



