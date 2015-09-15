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

	public function to83PCE($format_initial, $content){


			//conversion vers basic couleur 83PCE

	}

	public function decode8xp($type_entree, $content){

			//convertisseur fichier 8xp vers txt (text/plain)

	}

	public function encode8xp($type_entree, $content){

			//convertisseur fichier txt/textplain vers 8xp

	}





}
