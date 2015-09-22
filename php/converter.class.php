<?php



class converter {

		private $user;
		private $prgm_decode; 
		private $lang_prgm;
		public $type;
		private $typeofinput;

	public function __construct($prgm, $typeofinput, $type="", $lang = "EN", $user = "Guest"){

			$this->user = $user;
			$this->prgm_decode = $prgm;
			$this->lang_prgm = $lang;
			$this->type = $type;
			$this->typeofinput = $typeofinput; //type: 'input' OR 'file' only! See docs for further informations

		}

			
	public function to83Plus(){


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
			

				for ($i=0; $i <= 158 ; $i++) { 


						
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
		

			
	}

/**
* To get the type of the programm, for load good conversion module
*	@return: string The type of program (color or black & white), and the calculators compatibles
*/
	public function get_type_of_programm(){

		//echo self::read_line('ressources/sudoku_color.txt', 10).'ptin';

		include('tokens/tokens_array_type.php');

		if(!file_exists($this->path_txt)){

					return 'Erreur lors de l\'louverture du fichier!';
			}

	if($this->type == ""){


	
		for ($ligne=1; $ligne <= $this->linesofpgm(); $ligne++) { 

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
	





	public function to83PCE($format_initial, $content){


			//conversion vers basic couleur 83PCE

		


	}

	/*public static function decode8xp($path, $lang){

			include_once "src/autoloader.php";

			use tivars\TIVarFile;
			use tivars\TIVarType;
			use tivars\TIVarTypes;

		$current_prgm = TIVarFile::loadFromFile($path);
		$source = $current_prgm->getReadableContent(['lang' => $lang]);

		return $source;



	}*/

	public function encode8xp($type_entree, $content){

			//convertisseur fichier txt/textplain vers 8xp

	}


	private function read_line($line){

		$type = $this->typeofinput;
		$source = $this->prgm_decode;

			if($type == 'input'){

					$gcode = explode("\n", $source);

			}elseif ($type == 'file') {
			
					$rpl = str_replace('\\n', '<br />', $source); //on transforme provisoirement les \n en <br />, car les \n ne sont pas détecté par la suite par le explode..???
					$gcode = explode("<br />", $rpl);

			}

		

			return $gcode[$line-1];

		}

	private function linesofpgm(){

		$type = $this->typeofinput;
		$source = $this->prgm_decode;

			if($type == 'input'){

				return substr_count($source, "\n")+1;



		}elseif ($type == 'file') {
			
				$rpl = str_replace('\\n', '<br />', $source);
				return substr_count($rpl, "<br />")+1;

		}


	}

/**
*	@param: boolean $colorSyntax if color syntax is activated in the textarea
*	@return: string the textarea
*/
	 public function print_prgm($colorSyntax = false){

	 	$path = $this->path_txt;

	 	if(!file_exists($this->path_txt)){

					return 'Erreur lors de l\'louverture du fichier!';
			}



			$programm = fopen($path, 'r+');
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


}








