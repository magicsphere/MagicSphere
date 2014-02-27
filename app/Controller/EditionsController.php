<?php
	App::uses('AppController', 'Controller');

	class EditionsController extends AppController{
		
		public function beforeFilter(){
			parent::beforeFilter();

			$this->Auth->allow('list');
		}


		public function viewList(){

			
		}

	}
?>