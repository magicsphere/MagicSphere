<?php
	Class Card extends AppModel{
	
		public $validate = array(
			'name' => array(
				'alpha' => array(
					'rule' => '/^[a-z0-9A-Z ]*$/',
					'message' => 'nom de la carte pas valide'
				),
				'uniq' => array(
					'rule' => 'isUnique',
					'message' => 'Ce nom de carte existe déjà'
				)
			)
		);		

	}
?>