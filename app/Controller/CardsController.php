<?php
	App::uses('AppController', 'Controller');

	class CardsController extends AppController{
		
		public function beforeFilter(){
			parent::beforeFilter();

			$this->Auth->allow('ListCard','AddCard');
		}


		public function ListCard(){
			if(!empty($this->params['named']['id'])){

				$this->set('cards', $this->Card->find('all', 
											array(
												'fields' =>array('id','name','created'),
												'conditions' => array('game_id' => $this->params['named']['id'])
											)
										)
						);

				if(!empty($cards)){
					$this->Session->setFlash('Aucune cartes pour le moment !');
				}

			}else{
				return $this->redirect('/');
			}
		}

		public function viewcard($id = null){

			if (!$id) {
				throw new NotFoundException(__('Invalid Card'));
			}

			$Card = $this->Card->findById($id);
	        if (!$Card) {
	            throw new NotFoundException(__('Invalid Card'));
	        }

	        $this->set('Card', $Card);
		}

		public function AddCard($id = null){

			debug($id);

			if(!empty($id)){
				$Card = $this->Card->findById($id);
	
				$games = $this->Card->Game->find('list');

				$this->set(compact('games'));

				$this->request->data['Card']['id'] 		 = $Card['Card']['id'];
				$this->request->data['Card']['name'] 	 = $Card['Card']['name'];
			
			}else{
				if(!empty($this->request->data)){

					$this->Card->create($this->request->data);	

					/*On contrôle que les zone soit bien remplis*/
					if($this->Card->validates()){

						$this->Card->create(array(
								'name' => $this->request->data['Card']['name'],
								'games_id' => $this->request->data['Card']['games_id'],
								)
							);

							$this->Card->save();
					}
				}else{
					$games = $this->Card->Game->find('list');

					$this->set(compact('games'));
					
				}
			}

		}



	}
?>