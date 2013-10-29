<div class="row">
	<div class="span12">
		<hi>Se connecter</h1>

			<?php 
				echo $this->form->create('User'); 
				echo $this->form->input('username', array('label' => "Nom d'utilisateur"));
				echo $this->form->input('password', array('type'=> 'password', 'label' => "Mot de passe"));
				echo $this->form->end("Se connecter");
			?>

	</div>	
</div>