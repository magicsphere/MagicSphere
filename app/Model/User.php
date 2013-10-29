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
			)
		);		


		public function identicalFields($check, $limit){
			return $check['password2'] == $this->data['User']['password'];
		}
	}
?>