<div class="row">
	<div class= "span12">
		<h1>Rappel du mot de passe</h1>
	<?php 
		echo $this->Form->create('User');
		echo $this->Form->input ('Mail',array('label' => 'Email'));

		echo $this->form->end('Régénérer mon mot de passe');
	?>	
	</div>
</div>