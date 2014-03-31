<div class="row">
	<div class="span12">
		<hi>Liste des cartes Magic The Gathering</h1>
		<div class="table-responsive">
			<table class="table">
				<tr>
					<td></td>
					<td>Nom</td>
					<td>Crée le</td>
					<td>Options</td>
				</tr>
			<?php foreach ($cards as $card): ?>
	    		<tr>
	       			<td><?php echo $card['Card']['id']; ?></td>
	        		<td>
	           			 <?php echo $this->Html->link($card['Card']['name'],  array('controller' => 'Cards', 'action' => 'viewcard', 'id' => $card['Card']['id'])); ?>
	       			</td>
	       			<td><?php echo $card['Card']['created']; ?></td>
	       			<td>
			            <?php echo $this->Form->postLink(
			                'Supprimer',
			                array('action' => 'delete', $card['Card']['id']),
			                array('confirm' => 'Etes-vous sûr ?'));
			            ?>
			            <?php echo $this->Html->link(
			                'Editer',
			                array('action' => 'edit', $card['Card']['id'])
			            ); ?>
			        </td>
	    		</tr>
	    	<?php endforeach; ?>
	    	
	    	</table>
	    	<?php unset($card); ?>
   		</div>
	</div>	
</div>