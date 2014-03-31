<?php
	App::uses('AppController', 'Controller');

	class GamesController extends AppController{
		
		public function beforeFilter(){
			parent::beforeFilter();

			$this->Auth->allow('ListGame');
		}


		public function ListGame(){

			$this->set('games', $this->Game->find('all', 
										array(
											'fields' =>array('id','name','created')
										)
									)
					);

			if(!empty($games)){
				$this->Session->setFlash('Aucune jeux pour le moment !');
			}

		}
	}

?>