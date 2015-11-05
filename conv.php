<?php
	
	$return_param = "";
	$num_param = 1;


	if(isset($_POST['px'])){

		if(isset($_POST['xpxcolor'])){

				$xpxcolor = htmlspecialchars($_POST['xpxcolor']);

				if($num_param == 1){
						$return_param = 'xpxmono='.round($xpxcolor/2.81,0);
				}else{

						$return_param = $return_param.'&xpxmono='.round($xpxcolor/2.81,0);
				}

				$num_param++;
				
		}
		if(isset($_POST['ypxcolor'])){

				$ypxcolor = htmlspecialchars($_POST['ypxcolor']);

				if($num_param == 1){
						$return_param = 'ypxmono='.round($ypxcolor/2.66,0);
				}else{

						$return_param = $return_param.'&ypxmono='.round($ypxcolor/2.66,0);
				}

				$num_param++;
				
		}

		if(isset($_POST['xpxmono'])){

				$xpxmono = htmlspecialchars($_POST['xpxmono']);

				if($num_param == 1){
						$return_param = 'xpxcolor='.round($xpxmono/2.81,0);
				}else{

						$return_param = $return_param.'&xpxcolor='.round($xpxmono/2.81,0);
				}

				$num_param++;
				
		}
		if(isset($_POST['ypxmono'])){

				$ypxmono = htmlspecialchars($_POST['ypxmono']);

				if($num_param == 1){
						$return_param = 'ypxcolor='.round($ypxmono/2.66,0);
				}else{

						$return_param = $return_param.'&ypxcolor='.round($ypxmono/2.66,0);
				}

				$num_param++;
				
		}

		

		header('location:calc_coord.php?'.$return_param);




	}







?>