<div class="row">
	<div class="span12">
		<hi>Ajouter une carte</h1>

			<?php 
				echo $this->form->create('Card'); 
				echo $this->form->input('name', array('label' => "Nom "));
				echo $this->Form->input('games_id',array('label' => "Jeux "));
				echo $this->form->input('id', array('type' => 'hidden'));
				
				echo $this->form->end("Ajouter");
			?>

	</div>	
</div>