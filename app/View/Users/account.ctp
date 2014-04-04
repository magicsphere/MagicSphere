<div class="row">
	<div class="span8">
		<div class="row">
			<div class="span2">
				<?php echo $this->Html->image(''); ?>
			</div>
			<div class="span6">
				<h1>Mon compte</h1>
			<?php 
				echo $this->Form->create('User', array('type' => 'file')); 

				echo $this->Form->input('username',array('label' => "Nom d'utilisateur", 'disabled' => true));
				echo $this->Form->input('firstname',array('label' => "Prénom"));
				echo $this->Form->input('lastname',array('label' => "Nom"));
				echo $this->Form->input('avatarf', array('type' => 'file', 'label' => 'Avatar (Format jpg ou png)'));


				echo $this->Form->end('Modifier'); 
			?>
			</div>
		</div>
		<div class="span4">
		</div>
	</div>
</div>	