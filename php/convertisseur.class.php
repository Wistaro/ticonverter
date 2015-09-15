<?php



class convertisseur {

		public $type_original;
		public $type_final;
		private $user;

	public function __construct($original, $final, $user = "Guest"){

			$this->type_original = $original;
			$this->type_final = $final;
			$this->user = $user;


	}

	public function to83Plus($format_initial, $content){


			//conversion vers basic 83+/84+





	}

	private static function get_lang($content){

		$lang = "FR"; //default lang: french

		//Comparative tables of French and English functions
		$fr_spec = array('EffTable', 'EffEcran', 'EffDess', 'Cercle', 'Ligne(', 'Ombre(', 'Texte(', 'Pt-Aff(', 'Pt-NAff(', 'Pt-Changer(', '');
		$en_spec = array('ClrTable', 'ClrHome', 'ClrDraw', 'Circle(', 'Line(', 'Shade', 'Text(', 'Pt-On(', 'Pt-Off(', 'Pt-Chang(', '');

		//Language recognition based on the syntax of the commands





		return $lang;
	}

	public function to83PCE($format_initial, $content){


			//conversion vers basic couleur 83PCE

		$lang = self::get_lang($content);


			$specific_tokens_83PCE_FR = array(
				'CouleurGraph(' , 
				'CouleurTexte(' , 
				'ArrPlanAff' , 
				'ArrPlanNAff' , 
				'' 
			);

			$specific_tokens_83PCE_EN = array(
				'' , 
				'CouleurTexte(' , 
				'ArrPlanAff' , 
				'ArrPlanNAff' , 
				'' 
			);



	}

	public function decode8xp($type_entree, $content){

			//convertisseur fichier 8xp vers txt (text/plain)

	}

	public function encode8xp($type_entree, $content){

			//convertisseur fichier txt/textplain vers 8xp

	}





}
