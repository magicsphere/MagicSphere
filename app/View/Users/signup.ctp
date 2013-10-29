<div class="row">
	<div class="span12">
		<hi>S'inscrire</h1>

			<?php 
				echo $this->form->create('User'); 
				echo $this->form->input('username', array('label' => "Nom d'utilisateur"));
				echo $this->form->input('password', array('type'=> 'password', 'label' => "Mot de passe"));
				echo $this->form->input('password2', array('type'=> 'password', 'label' => "Confirmer Mot de passe"));
				echo $this->form->input('mail', array('label' => "Email"));
				echo $this->form->end("s'inscrire");

			?>

	</div>	
</div>