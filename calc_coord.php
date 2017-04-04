<?php
			require('head.php');

		?>

	<section class="SEC_main">
		<h1>Calcul de coordonnées</h1>

		Cet outils va vous permettre de convertir des coordonnées pour les différents modèle.<br ><br />
		<u><b>Rappels:</b></u> 

			<ul>
				<li><b>Rapport de réduction pixels:</b> 2.81 (x) * 2.66 px (y) </li>
				<li><b>Rapport de réduction texte:</b> 2.63 (y) * 2.80 px (x)</li>


			</ul><br />
			<u><b>Attention!</b></u><br />Cette méthode de conversion fonctionne uniquement si le pas des axes x et y est unitaire (dans la majorité des programmes c'est le cas).
			<br /><br />
	<div id="converter">
			<button class="startPixel">Convertir des pixels</button><button class="startText">Convertir des texts</button>
		
		<div class="ConvPixel">
			<h2>Conversion coordonnées pixels: </h2>
			
			<label>Coordonnée pixel sur x (horizontale) pour écran <b>couleur</b>: </label><input type="text" class="xpxcolor" value="" /><br />
			<label>Coordonnée pixel sur y (verticale)  pour écran <b>couleur</b>: </label><input type="text" class="ypxcolor" value=""/><br /><br /><br />

			<label>Coordonnée pixel sur x (horizontale) pour écran <b>monochrome</b>: </label><input type="text" class="xpxmono" value=""/><br />
			<label>Coordonnée pixel sur y (verticale)  pour écran <b>monochrome</b>: </label><input type="text" class="ypxmono" value=""/><br />
			<button class="goConv">Convertir</button><button class="restart">Recommencer</button>

			</div>

			<div class="ConvText">
			<h2>Conversion coordonnées texte: </h2>

			<u>Remarque</u><br />En TI-Basic, la syntaxe d'un Text(e) est: <b>Text(Y,X,"Un truc")</b><br /><ul>
			<br />
			
			<label>Coordonnée texte sur x (horizontale) pour écran <b>couleur</b>: </label><input type="text" class="xtxcolor" value="" /><br />
			<label>Coordonnée texte sur y (verticale)  pour écran <b>couleur</b>: </label><input type="text" class="ytxcolor" value=" "/><br /><br /><br />

			<label>Coordonnée texte sur x (horizontale) pour écran <b>monochrome</b>: </label><input type="text" class="xtxmono" value=""/><br />
			<label>Coordonnée texte sur y (verticale)  pour écran <b>monochrome</b>: </label><input type="text" class="ytxmono" value=""/><br />
			<button class="goConv">Convertir</button><button class="restart">Recommencer</button>
		</div>
	</div>

			
			
				

	</section>

	<?php

	require('footer.php');

	?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>

<script type="text/javascript">

	var mode = '';

	jQuery(function($){
    	$(".ConvPixel").hide();
    	$(".ConvText").hide();
	});



	$(".goConv").click(function(){
	
	 button = $(this).html(); 

	 if(mode == 'pxl'){

		 var val1 = $(".xpxcolor").val();
		 var val2 = $(".ypxcolor").val();
		 var val3 = $(".xpxmono").val();
		 var val4 = $(".xpxmono").val();

	 	


	 	if(!val1 && !val2 && val3 && val4){

	 		//mono to color - pixel

	 		$(".xpxcolor").val(parseInt(val3)*2.81);
	 		$(".ypxcolor").val(parseInt(val4)*2.66);

	 	}
	 	if(val1 && val2 && !val3 && !val4){

	 		//color to mono - pixel

	 		$(".xpxmono").val(parseInt(val1)/2.81);
	 		$(".ypxmono").val(parseInt(val2)/2.66);

	 	}




	 }else{

	 	 var val1 = $(".xtxcolor").val();
		 var val2 = $(".ytxcolor").val();
	 	 var val3 = $(".xtxmono").val();
	 	 var val4 = $(".xtxmono").val();

	 	if(!val1 && !val2 && val3 && val4){

	 		//mono to color - text

	 		$(".xtxcolor").val(Math.round(parseInt(val3)*2.80));
	 		$(".ytxcolor").val(Math.round(parseInt(val4)*2.63));

	 	}
	 	if(val1 && val2 && !val3 && !val4){

	 		//color to mono - text

	 		$(".xtxmono").val(Math.round(parseInt(val1)/2.80));
	 		$(".ytxmono").val(Math.round(parseInt(val2)/2.63));

	 	}

	 }


	});

	$(".startPixel").click(function(){
	
		$(".ConvPixel").fadeIn('1000').show();
		$(".ConvText").hide();
		mode = 'pxl';

	});
	$(".startText").click(function(){
	
		$(".ConvPixel").hide();
		$(".ConvText").fadeIn('1000').show();
		mode = 'txt';

	});

	$(".restart").click(function(){
		
		 $(':input','#converter')
   			.not(':button, :submit, :reset, :hidden')
  			.val('')
   			.removeAttr('checked')
   			.removeAttr('selected');
		

	});





</script>


