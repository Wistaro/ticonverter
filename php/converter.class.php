<?php



class converter {

		public $type_original;
		public $type_final;
		private $user;

	public function __construct($original = "", $final="", $user = "Guest"){

			$this->type_original = $original;
			$this->type_final = $final;
			$this->user = $user;


	}

	public function to83Plus($format_initial, $content){


			//conversion vers basic 83+/84+





	}

	private static function get_lang($path){

		$lang = "FR"; //default lang: french

		

		





		return $lang;
	}


	public static function get_typeofprogramm($path, $lang = "EN"){

		//echo self::read_line('ressources/sudoku_color.txt', 10).'ptin';

		include('tokens/tokens_array_type.php');


	

		for ($ligne=1; $ligne <= self::linesofpgm($path); $ligne++) { 

			$current_line = self::read_line('ressources/sudoku_color.txt', $ligne);
			

				for ($i=0; $i <= 6 ; $i++) { 

						$search = stripos($current_line, self::get_function_readable($lang, $color_only[$i]));

						if($search !== false){

								return 'Modèle couleur - 83PCE/84+CE';

						}


				}

				
			}

			return 'Modèle monochrome - 83(+)/84(+)(SE)';

	}

/**
	@param: string $lang default="EN" Language of the token choosen, int $ID id of the token/readable function
	@return: string the readable name of the fonction whith the ID selected
*/

	private static function get_function_readable($lang = "EN", $ID){

	

		if($lang == "FR"){

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

		$lang = self::get_lang($content);




			



	}

	public function decode8xp($type_entree, $content){

			//convertisseur fichier 8xp vers txt (text/plain)

	}

	public function encode8xp($type_entree, $content){

			//convertisseur fichier txt/textplain vers 8xp

	}


	static public function read_line($path, $line){

		$line_effect = '';

		$programm = fopen($path, 'r+');

		for ($i=1; $i<=$line; $i++) { 

			$line_effect = fgets($programm);
			
		}
		
		return $line_effect;

        fclose($programm);

	}

	static private function linesofpgm($path){

		$programm = fopen($path, 'r+');
   	 	$nb_line = 0;

   	 	while (!feof($programm)) {

            	 $line_effect = fgets($programm);

                   			 $nb_line++;
     		  	}

     		return $nb_line;

	}

/**
	@param: string $path path of txt file, boolean $colorSyntax if color syntax is activated in the textarea
	@return: string the textarea
*/
	static public function print_prgm($path, $colorSyntax = false){

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





}








