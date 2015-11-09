<?php
	
	$return_param = "";
	$num_param = 1;
	$conv_base = "";

	if(!empty($_POST['xpxcolor']) OR !empty($_POST['ypxcolor'])){

		$conv_base = 'color';
		echo 'color';


	}elseif (!empty($_POST['xpxmono']) OR !empty($_POST['ypxmono'])) {
		$conv_base = 'mono';
		echo 'mono';
	}


	if(isset($_POST['px'])){

		if(isset($_POST['xpxcolor']) AND $conv_base == 'color'){

				$xpxcolor = htmlspecialchars($_POST['xpxcolor']);

				if($num_param == 1){
						$return_param = 'xpxmono='.round($xpxcolor/2.81,0);
				}else{

						$return_param = $return_param.'&xpxmono='.round($xpxcolor/2.81,0);
				}

				$num_param++;
				
		}
		if(isset($_POST['ypxcolor']) AND $conv_base == 'color'){

				$ypxcolor = htmlspecialchars($_POST['ypxcolor']);

				if($num_param == 1){
						$return_param = 'ypxmono='.round($ypxcolor/2.66,0);
				}else{

						$return_param = $return_param.'&ypxmono='.round($ypxcolor/2.66,0);
				}

				$num_param++;
				
		}

		if(isset($_POST['xpxmono']) AND $conv_base == 'mono'){

				$xpxmono = htmlspecialchars($_POST['xpxmono']);

				if($num_param == 1){
						$return_param = 'xpxcolor='.round($xpxmono/2.81,0);
				}else{

						$return_param = $return_param.'&xpxcolor='.round($xpxmono/2.81,0);
				}

				$num_param++;
				
		}
		if(isset($_POST['ypxmono']) AND $conv_base == 'mono'){

				$ypxmono = htmlspecialchars($_POST['ypxmono']);

				if($num_param == 1){
						$return_param = 'ypxcolor='.round($ypxmono/2.66,0);
				}else{

						$return_param = $return_param.'&ypxcolor='.round($ypxmono/2.66,0);
				}

				$num_param++;
				
		}

		if($conv_base == 'mono'){

				$return_param = $return_param.'&xpxmono='.$_POST['xpxmono'].'&ypxmono='.$_POST['ypxmono'];

		}elseif ($conv_base == 'color') {

				$return_param = $return_param.'&xpxcolor='.$_POST['xpxcolor'].'&ypxcolor='.$_POST['ypxcolor'];
		}

		

		header('location:calc_coord.php?'.$return_param);




	}







?>