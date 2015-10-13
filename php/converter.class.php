<?php



class converter {

		private $user;
		private $prgm_decode; 
		private $lang_prgm;
		public $type;
		private $typeofinput;

	public function __construct($prgm, $type="", $lang = "", $user = "Guest"){

			$this->user = $user;
			$this->prgm_decode = $prgm;
			$this->lang_prgm = $lang;
			$this->type = $type;
			//$this->typeofinput = $typeofinput; //type: 'input' OR 'file' only! See docs for further informations

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

								
					

				$global = $global.$currentline;

		}

		return $global;




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


					$correction = substr($currentline, 0, stripos($currentline, $regexline[2]) -1).')';
					
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
			if(preg_match($textcolor,$currentline,$regextext)){  //texte couleurs vers texte monochromes


					
					$correction = substr($currentline, 0, stripos($currentline, $regextext[count($regextext)-1]) -1).')';
					
					return $correction;

			}
			if(preg_match($ptoncolor,$currentline,$regexpt)){  //pton couleurs vers pton monochromes


					
					$correction = substr($currentline, 0, stripos($currentline, $regexpt[count($regexpt)-1]) -1).')';
					
					return $correction;

			}
			if(preg_match($pxlcolor,$currentline,$regexpxl)){  //pxlon couleurs vers pxlon monochromes


					
					$correction = substr($currentline, 0, stripos($currentline, $regexpxl[count($regexpxl)-1]) -1).')';
					
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


}








