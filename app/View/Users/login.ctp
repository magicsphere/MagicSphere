<div class="span12">
	<h1>Se connecter</h1>

		<?php 
			echo $this->form->create('User'); 
			echo $this->form->input('username', array('label' => "Nom d'utilisateur"));
			echo $this->form->input('password', array('type'=> 'password', 'label' => "Mot de passe"));
			echo $this->form->end('Se connecter');
			echo $this->Html->link('Mot de passe oublié', array('action' => 'forgot'))
		?>

</div>	