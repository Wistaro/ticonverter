<?php



class converter {

		private $user;
		private $prgm_decode; 
		private $lang_prgm;
		public $type;
		private $typeofinput;
		public $typeOfWindows;

	public function __construct($prgm, $typeconvert="", $lang = "", $user = "Guest"){

			$this->user = $user;
			$this->prgm_decode = $prgm;
			$this->lang_prgm = $lang;
			$this->type = $typeconvert;


			
			//$this->typeofinput = $typeofinput; //type: 'input' OR 'file' only! See docs for further informations

		}

	public function GetTypeOfDefinitionScreen(){

		$nblines = count(explode("\n", $this->prgm_decode))-1;
		for ($i=1; $i <=$nblines; $i++) { 
			
			$currentline = self::read_line($i)."\n";

			if(strrpos($currentline, '∆X') === FALSE AND strrpos($currentline, '∆Y') === FALSE){
										

			}else{
				$this->typeOfWindows = "delta";
				

			}

		}

		if($this->typeOfWindows == ""){
				$this->typeOfWindows = "pasDelta";
		}



	}

	public function ColorToMono(){

		$global = "";
		$nblines = count(explode("\n", $this->prgm_decode))-1;

		for ($i=1; $i <=$nblines; $i++) { 
			
			$currentline = self::read_line($i)."\n";
			

			
						if(self::iscoloredtotal($currentline) == "delall"){

							//effacement total
							$currentline = "";
							
							}elseif (self::iscoloredtotal($currentline) != "nothing") {
								
								$currentline = self::iscoloredtotal($currentline)."\n";

							}

								
				
				
				$corr_coord = self::conv_coord($currentline,"CTM",$this->typeOfWindows);	
				
				$global = $global.$corr_coord;	
				

		}

		return $global;




	}	
	public function MonoToColor(){

		$global = "";
		$nblines = count(explode("\n", $this->prgm_decode))-1;

		for ($i=1; $i <=$nblines; $i++) { 
			
			$currentline = self::read_line($i)."\n";
			

			
						if(self::iscoloredtotal($currentline) == "delall"){

							//effacement total
							$currentline = "";
							
							}elseif (self::iscoloredtotal($currentline) != "nothing") {
								
								$currentline = self::iscoloredtotal($currentline)."\n";

							}

								
				
				
				$corr_coord = self::conv_coord($currentline,"MTC",$this->typeOfWindows);	
				
				$global = $global.$corr_coord;	
				

		}

		return $global;




	}	
	public function conv_coord($code,$mode, $typeOfWindows){	

		$ratio_x_px = "2.81";
		$ratio_y_px = "2.66";
		

		$ratio_x_txt = "2.8";
		$ratio_y_txt = "2.63";

		if($mode == "CTM"){ //Color to Mono
				$sign = "/";
		}elseif ($mode == "MTC") { //Mono to color
				$sign = "*";
		}


			include('php/regex.php');

		//saving preg match
		preg_match($linesimple2,$code,$linenocolor);
		preg_match($ptsimple2,$code,$ptnocolor);
		preg_match($ptsimpleno,$code,$ptoffnocolor);
		preg_match($horiznocolor,$code,$horiznocolortab);
		preg_match($vertinocolor,$code,$vertinocolortab);
		preg_match($ptchangenocolor,$code,$ptchangenocolortab);
		preg_match($pxonnocolor,$code,$pxonnocolortab);
		preg_match($pxoffnocolor,$code,$pxoffnocolortab);
		preg_match($pxlchangenocolor,$code,$pxlchangenocolortab);
		preg_match($textnocolor,$code,$textnocolortab);
		preg_match($cerclenocolor,$code,$cerclenocolortab);
		preg_match("#(Pxl-Test)\(([^,]+)\,([^,]+)#i",$code,$pxtesttab);


		if(count($linenocolor) > 0 AND $typeOfWindows == "delta") { //there is a line here

			$temp = "";
			$global = $linenocolor[1].'(';

			for ($i=2; $i < count($linenocolor); $i++) { 

				if($i == 2 OR $i == 4){
						$temp = '('.$linenocolor[$i].')'.$sign.$ratio_x_px;
						$global = $global.$temp.',';
				}
				if($i == 3){
						$temp = '('.$linenocolor[$i].')'.$sign.$ratio_y_px;
						$global = $global.$temp.',';
				}
				if($i == 5 AND $mode == "CTM"){
						
						$temp = '(1/'.$ratio_y_px.')('.$linenocolor[5];
						$global = $global.$temp;
				}
				if($i == 5 AND $mode == "MTC"){
						
						$temp = '('.$ratio_y_px.')('.$linenocolor[5];
						$global = $global.$temp;
				}
			}

			if(count($linenocolor) == 7){

				$global = $global.'),0'."\n";
			}

			return $global;

		}elseif (count($ptnocolor) > 0 AND $typeOfWindows == "delta") { //there is a pton here
			
			$temp = "";
			$global = $ptnocolor[1].'(';

			for($i = 3;$i<= count($ptnocolor);$i++){

					if($i == 3){

							$global = $global.'('.$ptnocolor[3].')'.$sign.$ratio_x_px;
					}
					if($i == 4 AND count($ptnocolor) <= 5){

							$global = $global.',('.substr($ptnocolor[4],0,(strlen($ptnocolor[4])-1)).$sign.$ratio_y_px;

					}
					if($i == 4 AND count($ptnocolor) > 5){

							$global = $global.',('.$ptnocolor[4].')'.$sign.$ratio_y_px;

					}
					if($i == 6){

							$global = $global.','.$ptnocolor[6];

					}

			}

				return $global."\n";


		}elseif(count($ptoffnocolor) > 0 AND $typeOfWindows == "delta"){ 

			$temp = "";
			$global = $ptoffnocolor[1].'(';

			for($i = 3;$i<= count($ptoffnocolor);$i++){

					if($i == 3){

							$global = $global.'('.$ptoffnocolor[3].')'.$sign.$ratio_x_px;
					}
					if($i == 4 AND count($ptoffnocolor) <= 5){

							$global = $global.',('.substr($ptoffnocolor[4],0,(strlen($ptoffnocolor[4])-1)).$sign.$ratio_y_px;

					}
					if($i == 4 AND count($ptoffnocolor) > 5){

							$global = $global.',('.$ptoffnocolor[4].')'.$sign.$ratio_y_px;

					}
					if($i == 6){

							$global = $global.','.$ptoffnocolor[6];

					}

			}

				return $global."\n";




		}elseif(count($horiznocolortab) > 0 AND $typeOfWindows == "delta"){

				$global = $horiznocolortab[1].' ('.rtrim($horiznocolortab[2]).$sign.$ratio_y_px.')';
				return $global."\n";

		}elseif(count($vertinocolortab) > 0 AND $typeOfWindows == "delta"){

				$global = $vertinocolortab[1].' ('.rtrim($vertinocolortab[2]).$sign.$ratio_x_px.')';
				return $global."\n";

		}elseif (count($ptchangenocolortab) > 0 AND $typeOfWindows == "delta") {

				$global = $ptchangenocolortab[1].'(('.$ptchangenocolortab[2].')'.$sign.$ratio_x_px.',('.rtrim($ptchangenocolortab[3]).$sign.$ratio_y_px;
				return $global."\n";
			
		}elseif (count($pxonnocolortab) > 0) {
				
				$global = $pxonnocolortab[1].'(int(('.$pxonnocolortab[3].')'.$sign.$ratio_x_px.'),int(('.rtrim($pxonnocolortab[4]).')'.$sign.$ratio_y_px.'';
				return $global."\n";

		}elseif (count($pxoffnocolortab) > 0) {
				
				$global = $pxoffnocolortab[1].'(('.$pxoffnocolortab[3].')'.$sign.$ratio_x_px.',('.rtrim($pxoffnocolortab[4]).$sign.$ratio_y_px;
				return $global."\n";

		}elseif (count($pxlchangenocolortab) > 0) {
				
				$global = $pxlchangenocolortab[1].'(('.$pxlchangenocolortab[2].')'.$sign.$ratio_x_px.',('.rtrim($pxlchangenocolortab[3]).$sign.$ratio_y_px;
				return $global."\n";

		}elseif (count($textnocolortab) > 0) { //need fix


				if(strrpos($code,"Text(-1,") === FALSE AND strrpos($code,"Texte(-1,") === FALSE){
					//classic: no -1 argument
					$global = $textnocolortab[1].'(int(('.$textnocolortab[count($textnocolortab)-3].')'.$sign.$ratio_y_txt.'),int(('.$textnocolortab[count($textnocolortab)-2].')'.$sign.$ratio_x_txt.'),'.$textnocolortab[count($textnocolortab)-1];

				}else{

					//maj size: -1 argument

					if($textnocolortab[1] == "Text"){
						$pos = 8;
				
					}else{
						$pos = 9;
					}

					$newstring = $textnocolortab[1]."(".substr($code, $pos);
					preg_match($textnocolor,$newstring,$textwt1);
					$global = $textnocolortab[1].'(-1,(int(('.$textwt1[3].')'.$sign.$ratio_y_txt.'),int(('.$textwt1[4].')'.$sign.$ratio_y_txt.'),'.$textwt1[5];

				}
				
				//$global = $textnocolortab[1].'(int(('.$textnocolortab[count($textnocolortab)-3].')'.$sign.$ratio_y_txt.'),int(('.$textnocolortab[count($textnocolortab)-2].')'.$sign.$ratio_x_txt.'),'.$textnocolortab[count($textnocolortab)-1];
				return $global."\n";
		}elseif (count($cerclenocolortab) > 0 AND $typeOfWindows == "delta") {
				
				$global = $cerclenocolortab[1].'(('.$cerclenocolortab[3].')'.$sign.$ratio_x_px.',('.$cerclenocolortab[4].')'.$sign.$ratio_y_px.',('.rtrim($cerclenocolortab[5]).$sign.'2.8';
				return $global;




		}elseif (count($pxtesttab) > 0) {

			if(preg_match($pxtest,$code)){

				//que du pixel test

				if(preg_match("#[\)]#i",$pxtesttab[3])){



						$global = 'pxl-Test(('.$pxtesttab[2].')'.$sign.$ratio_y_txt.',('.rtrim($pxtesttab[3]).$sign.$ratio_x_txt;


				}else{
						
						$global = 'pxl-Test(('.$pxtesttab[2].')'.$sign.$ratio_y_txt.',('.rtrim($pxtesttab[3]).')'.$sign.$ratio_x_txt;


				}
				return $global."\n";

				//
			}else{

				//start

				preg_match_all("#Pxl-Test\([^,]+\,[^,:\)\s→]+#i", $code, $matches);




				for($i=0;$i<count($matches[0]);$i++){

					$TestString = new Converter($matches[0][$i]."\n");

					if($mode == "CTM"){ //Color to Mono
						 $code = str_replace($matches[0][$i], rtrim($TestString->ColorToMono()), $code);
					}elseif ($mode == "MTC") { //Mono to color
						 $code = str_replace($matches[0][$i], rtrim($TestString->MonoToColor()), $code);
					}
				    

					}
	
				return $code;

				//end
			}
				
				
				
		}else{

			return $code;

		}
	}

		
	private function iscoloredtotal($currentline){

		include('php/regex.php');



	                   

		$totalcolor = array('Background', 'TextColor', 'CouleurTexte', 'ArrPlan', 'GraphColor', 'CouleurGraph', 'BorderColor', 'CouleurBord');

			for ($i=0; $i <=count($totalcolor)-1; $i++) { 
				
					if (preg_match('#^'.$totalcolor[$i].'#i', $currentline)) {
						return "delall";
					}

			}

			if(preg_match($linecolor,$currentline,$regexline)){ //lignes couleurs vers lignes monochromes


					$correction = substr($currentline, 0, stripos($currentline, $regexline[2]) -1).')'; //correction fonction
					//$correction = self::coord_mono_to_color($currentline); //correction coordonnées
					
					return $correction;

			}
			if(preg_match($horizcolor,$currentline,$regexhoriz)){ //horizontales couleurs vers horizontales monochromes


					
					$correction = substr($currentline, 0, stripos($currentline, $regexhoriz[count($regexhoriz)-1]) -1);
					
					return $correction;

			}
			if(preg_match($verticcolor,$currentline,$regexvertic)){ //verticales couleurs vers verticales monochromes


					
					$correction = substr($currentline, 0, stripos($currentline, $regexvertic[count($regexvertic)-1]) -1);
					
					return $correction;

			}
			/*if(preg_match($textcolor,$currentline,$regextext)){  //texte couleurs vers texte monochromes


					
					$correction = substr($currentline, 0, stripos($currentline, $regextext[count($regextext)-1]) -1).')';
					
					return $correction;

			}*/
			if(preg_match($ptoncolor,$currentline,$regexpt)){  //pton couleurs vers pton monochromes


					
					$correction = substr($currentline, 0, stripos($currentline, $regexpt[count($regexpt)-1]) -1);
					
					return $correction;

			}
			if(preg_match($pxlcolor,$currentline,$regexpxl)){  //pxlon couleurs vers pxlon monochromes


					
					$correction = substr($currentline, 0, stripos($currentline, $regexpxl[count($regexpxl)-1]) -1).')';
					
					return $correction;

			}
			if(preg_match($ptchangecolor,$currentline,$regexchg)){  //ptchange couleurs vers pxlon monochromes


					$correction = substr($currentline, 0, stripos($currentline, $regexchg[count($regexchg)-1]) -1).')';
					
					return $correction;

			}
			if(preg_match($pxlchangecolor,$currentline,$regexpxlchg)){  //pxlchange couleurs vers pxlon monochromes


					$correction = substr($currentline, 0, stripos($currentline, $regexpxlchg[count($regexpxlchg)-1]) -1).')';
					
					return $correction;

			}
			if(preg_match($cerclecolor,$currentline,$regexcircle)){  //cercle couleur to mono


					$correction = substr($currentline, 0, stripos($currentline, $regexcircle[count($regexcircle)-1]) -1).')';
					
					return $correction;

			}



			
		
		return "nothing";

		}

		


	public function to83Plus(){


		$source = $this->prgm_decode;

		for ($ligne=1; $ligne<=$this->linesofpgm(); $ligne++) { 
			
				echo $this->read_line($ligne).'<br />';
		}


			//conversion vers basic 83+/84+





	}

/**
* Genere la langue du programme si elle n'est pas spécifiée par l'utilisateur
* @param: 
* @return: 
*/
	public function search_lang(){

		include('tokens/tokens_array_type.php');

	
		if($this->lang_prgm == ""){

				//searching langage 

			for ($ligne=1; $ligne <= $this->linesofpgm(); $ligne++) { 

			$current_line = $this->read_line($ligne);
			echo $current_line;

				for ($i=0; $i <= 50 ; $i++) { 


						
						$search = stripos($current_line, $this->get_function_readable($fr_only[$i]));


						if($search !== false){

								$this->lang_prgm('FR');	

								return $this->lang_prgm;

						}


				}

				
			}


					$this->lang_prgm = 'EN';

					return $this->lang_prgm;


		}
		
		return $this->lang_prgm;
			
	}

/**
* To get the type of the programm, for load good conversion module
*	@return: string The type of program (color or black & white), and the calculators compatibles
*/
	public function get_type_of_programm(){

		//echo self::read_line('ressources/sudoku_color.txt', 10).'ptin';

		include('tokens/tokens_array_type.php');

		
	if($this->type == ""){

		$nblines = count(explode("\n", $this->prgm_decode))-1;

	
		for ($ligne=1; $ligne <= $nblines; $ligne++) { 

			$current_line = $this->read_line($ligne);

			

				for ($i=0; $i <= 6 ; $i++) { 

						
						$search = stripos($current_line, $this->get_function_readable($color_only[$i]));

						if($search !== false){

								$this->type = 'Couleur - 83PCE/84+CE';
								return 'Couleur - 83PCE/84+CE';

						}


				}

				
			}

			$this->type = 'Monochrome - 83(+)/84(+)(SE)';
			return 'Modèle monochrome - 83(+)/84(+)(SE)';

		}

	}

/**
*	@param:  int $ID id of the token/readable function
*	@return: string  the readable name of the fonction whith the ID selected
*/

	public function get_function_readable($ID){


	$lang = $this->lang_prgm;


		if($lang == "FR" OR $lang == ""){
			$col1 = 5;
			$col2 = 6;
			}elseif ($lang == "EN") {
		
			$col1 = 4;
			$col2 = 5;
		}

		$fichier = "tokens/tokens.csv";
		
		$function = '';
		$cpt = 0;
		$fic = fopen($fichier, 'r+');
		




	
		for ($ligne = fgetcsv($fic, 1024); $cpt<=$ID; $ligne = fgetcsv($fic, 1024)) {
			$cpt++;
  		
  			$j = $col2;
  			for ($i = $col1; $i < $j; $i++) {
  				$function = $ligne[$i]; 	
  				}		
  		}
  	
		return $function;
	}
	





	public function to83PCE(){


			//conversion vers basic couleur 83PCE

		


	}


	public function encode8xp($type_entree, $content){

			//convertisseur fichier txt/textplain vers 8xp

	}


	public function read_line($line){

		//$type = $this->typeofinput;
		$source = $this->prgm_decode;
		$tbl = explode("\n", $this->prgm_decode);
		$nblines = count($tbl)-1;

		if($line <= 0 OR $line > $nblines+1){

				return 'Out of bounds';
		}else{

			
					return $tbl[$line-1];

				}

		}


/**
*	@param: boolean $colorSyntax if color syntax is activated in the textarea
*	@return: string the textarea
*/
	 public function print_prgm($colorSyntax = false){

	 	$source = $this->prgm_decode;



	     		$max_leng = 0;
  			$global = "";

  			if($colorSyntax === true){

  					$id_textarea = "TTREA_code";

  			}else{

  					$id_textarea = "normal";
  			}



    
    	if ($programm) {

       	 while (!feof($programm)) {

            	 $line_effect = fgets($programm);

             		 if (strlen(ltrim($line_effect)) > $max_leng) {

                       		 	$max_leng = strlen(ltrim($line_effect));
                     
                		 	}

            		 	$global = $global.(ltrim($line_effect)).'  ';


          			     		  	}
        
  		  	}

    
  		  	echo '<p><b>Nombre de lignes: </b>'.self::linesofpgm($path).'</p>';
  		  	/*echo '<p><b>Type: </b>TI-Basic eZ80</p>';
  		  	echo '<p><b>Compatibilité: </b>Ecrans couleurs, écran monochrome</p>';
  		  	echo '<p><b>Calculatrices incompatibles: </b> <i>aucunes</i></p>'; */
  		 	 echo '<textarea id="'.$id_textarea.'" cols='.self::linesofpgm($path).' rows='.$max_leng.'>'.$global.'</textarea>';

  		  	/*echo '<br /><button>Convertir</button>'; */

	

			fclose($programm);


		}


	public function getpath(){

			return $this->path_txt;

	}

	public function getlang(){

			return $this->lang_prgm;

	}
	public function getSrc(){

			return $this->prgm_decode;

	}
	public function getTypeWindows(){

			return $this->typeOfWindows;

	}


}








