<div class="row">
	<div class="span12">
		<hi>Modifier mon mot de passe</h1>

			<?php 
				echo $this->form->create('User'); 
				echo $this->form->input('password', array('type'=> 'password', 'label' => "Mot de passe"));
				echo $this->form->input('password2', array('type'=> 'password', 'label' => "Confirmer Mot de passe"));
				echo $this->form->end("s'inscrire");

			?>

	</div>	
</div>