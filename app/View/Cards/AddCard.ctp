<div class="row">
	<div class="span12">
		<hi>Ajouter une carte</h1>

			<?php 
				echo $this->form->create('Card'); 
				echo $this->form->input('name', array('label' => "Nom "));
				echo $this->Form->input('jeux', 
											array(
					      						'options' => $games,
				      							'empty' => '(choisissez)'
				  							)
				  						);
				echo $this->form->end("Ajouter");
			?>

	</div>	
</div>