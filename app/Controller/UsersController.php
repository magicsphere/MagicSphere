<?php
	App::uses('AppController', 'Controller');

	class UsersController extends AppController{

		public function beforeFilter(){
			parent::beforeFilter();

			$this->Auth->allow('signup','activate','forgot','login','');
		}

		public function login(){

			if(!empty($this->request->data)){
			
				debug($this->request->data['User']['password']);

				if($this->Auth->login()){
					$this->Session->setFlash('Vous êtes maintenant connecté','flash',array('class' => 'success'));
				}else{

					$this->Session->setFlash('Indentifiants incorrects','flash',array('class' => 'error'));
				}
			}
		}

		public function logout(){
			$this->Auth->logout();

			return $this->redirect('/');
		}

		public function signup(){
			if(!empty($this->request->data)){

				$this->User->create($this->request->data);
				
				if($this->User->validates()){

						$token = md5(time().'-'.uniqid());

						$this->User->create(array(
							'username' => $this->request->data['User']['username'],
							'password' => $this->Auth->password($this->request->data['User']['password']),
							'mail' => $this->request->data['User']['mail']	,
							'token' => $token
							)
						);

						$this->User->save();

						App:uses('CakeEmail', 'Network/Email');

						$CakeEmail = new CakeEmail('default');
						$CakeEmail->to($this->date['User']['mail']);
						$CakeEmail->subject('Votre inscription Magicsphere');
						$CakeEmail->viewVars($this->request->data['User'] + 
									array('token' => $token, 'id' => $this->User->id));
						$CakeEmail->emailFormat('text');
						$CakeEmail->template('signup');
						$CakeEmail->send();


						$this->Session->setFlash('Merci vous êtez inscrit');
				}else{
					$this->Session->setFlash('Merci de corriger vos erreurs', 'flash',array('class' => 'error'));
				}

			}

		}



		public function forgot(){
			if(!empty($this->request->data)){

				$User = $this->User->findByMail($this->request->data['User']['Mail'], array('id'));

				if(empty($User)){
					$this->Session->setFlash('Ce mail n\'est associé a aucun compte','flash',array('class' => 'error'));
				}else{


					$token = md5(time().'-'.uniqid());
					$this->User->id = $User['User']['id'];
					$this->User->saveField('token',$token);

					App:uses('CakeEmail', 'Network/Email');

					$CakeEmail = new CakeEmail('default');
					$CakeEmail->to($this->request->data['User']['Mail']);
					$CakeEmail->subject('Regénération de mot de passe');
					$CakeEmail->viewVars(array('token' => $token, 'id' => $User['User']['id']));
					$CakeEmail->emailFormat('text');
					$CakeEmail->template('password');
					$CakeEmail->send();

					$this->Session->setFlash("Un email vous à été envoyé avec les instructions pour regénérer votre mot de passe","Notif.success");
				}
			}

		}

		public function password(){
			$user = $this->User->find('first', array(
					'fields' =>array('id'),
					'conditions' => array('id' => $user_id, 'token'=>$token)
					)
			);

			if(empty($user)){
				$this->Session->setFlash('Ce lien ne semble pas bon');
				return $this->redirect(array('action' => 'forgot'));
			}

			if(!empty($this->request->data)){
				$this->User->create($this->request->data);

				if($this->User->validates()){

					$this->User->create();

					$this->User->save(array(
							'id' => $User['User']['id'],
							'token' => '',
							'active' => 1,
							'Password' => $this->Auth->password($this->request->data['User']['password'])	
						));

				}

				$this->Session->setFlash("Votre mot de passe a bien été modifié","flash", array('class' => 'success'));

				return $this->redirect(array('action' => 'login' ));
			}

		}

		public function activate($user_id, $token){
			$user = $this->User->find('first', array(
					'fields' =>array('id'),
					'conditions' => array('id' => $user_id, 'token'=>$token)
					)
			);

			if(empty($user)){
				$this->Session->setFlash('Ce lien de validation est incorecte !');
				return $this->redirect('/');
			}

			$this->Session->setFlash('Votre compte à bien été validé');
			$this->User->save(array(
					'id' => $User['User']['id'],
					'active' => 1, 
					'token' =>''
			));

			return $this->redirect(array('action' => 'login'));
		}

		/*Fonction de gestion du compte (Modification des données personnelles)*/
		public function account(){
			if(!empty($this->request->data)){
				
				$this->request->data['User']['id'] = $this->Auth->user('id');

				$this->User->create($this->request->data);
				
				if($this->User->validates()){

					$this->User->save($this->request->data, true, array('firstname','lastname'));

					/*Gestion de l'image d'avatar*/
					if(!empty($this->request->data['User']['avatarf']['tmp_name'])){
						
						$directory = IMAGES . ceil($this->User->id / 1000);

						if(!file_exists($directory)){
							mkdir($directory,0777);
						}

						$info = pathinfo($this->request->data['User']['avatarf']['name']);
						
						move_uploaded_file($this->request->data['User']['avatarf']['tmp_name'], $directory . DS . $this->User->id . $info['extension']);

						$this->User->saveField('avatar', 1);
		
					}

					
					$this->Session->setFlash("Vos informations ont bien été modifiées","flash", array('class'=>'success'));
				}
			}else{
				$this->User->id = $this->Auth->user('id');
				$this->request->data = $this->User->read();
			}

			$this->request->data['User']['username'] = $this->Auth->user('username');

		}

	}
?>