<?php

	if($_GET['mode'] == 'before'){

				
			echo "<script>";

echo "document.getElementById('message').style.display = \"block\";";

echo "</script>";

ob_flush();

flush();

ob_flush();

flush();



	}else{



		echo "<script>";

echo "document.getElementById('message').style.display = \"none\";";

echo "</script>";



	}



?>