<?php
	Class User extends AppModel{
	
		public $validate = array(
			'username' => array(
				'alpha' => array(
					'rule' => '/^[a-z0-9A-Z]*$/',
					'message' => 'Votre nom d\'utilisateur n\'est pas valide'
				),
				'uniq' => array(
					'rule' => 'isUnique',
					'message' => 'Ce pseudo est déjà utilisé'
				)
			),
			'mail' => array(
				'mail' => array(
					'rule' => 'email'
				),
				'uniq' => array(
					'rule' => 'isUnique',
					'message' => 'Cet email est déjà utilisé'
				)
			),
			'password' => array(
				'rule' => 'notEmpty'
			),
			'password2' => array(
				'rule' => 'identicalFields'
			),
			'avatarf' => array(
				'rule' => 'isJpgPng',
				'message' => 'Vous devez envoyer un fichier au format Jpg ou png'
			)
		);		


		public function identicalFields($check, $limit){

			$field = key($check);
			
			return $check[$field] == $this->data['User']['password'];
		}

		public function isJpgPng($check, $limit){

			$field = key($check);

			$fieldname = $check[$field]['name'];

			if(!empty($fieldname)){

				$info = pathinfo($fieldname);

				if(strtolower($info['extension']) != 'jpg' && strtolower($info['extension']) != 'png'){
					return false;
				}


			}

			return true;
			
		}
	}
?>