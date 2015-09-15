<?php





class membres {

		
		private $pseudo;
		private $mdp;
		private $mail;
		private $type;


	public function __construct($psd, $mdp, $mail, $type = "membre"){

			$this->pseudo = $psd;
			$this->mdp = $mdp;
			$this->mail = $mail;
			$this->type = $type;


	}

	private function uploadfile($type, $public = true, $content){

			


	}


	private function promote($user, $newrank){



	}







}
