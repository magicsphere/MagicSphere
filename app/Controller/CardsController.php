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
												'conditions' => array('id_games' => $this->params['named']['id'])
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

		public function AddCard(){
			if(!empty($this->request->data)){

				$this->Card->create($this->request->data);	

				/*On contrôle que les zone soit bien remplis*/
				if($this->Card->validates()){

					$this->Card->create(array(
							'name' => $this->request->data['Card']['name'],
							'id_jeux' => $this->request->data['Card']['jeux'],
							)
						);

						$this->Card->save();
				}
			}else{
				$this->set('games',$this->Game->find('all', 
							array(
									'fields' => array('id','name')
								)
							)
						);
			}

		}



	}
?>