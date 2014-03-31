<div class="row">
	<div class="span12">
		<hi>Liste des jeux</h1>
		<div class="table-responsive">
			<table class="table">
				<tr>
					<td></td>
					<td>Nom</td>
					<td>Crée le</td>
					<td>Options</td>
				</tr>
			<?php foreach ($games as $game): ?>
	    		<tr>
	       			<td><?php echo $game['Game']['id']; ?></td>
	        		<td>
	           			 <?php echo $this->Html->link($game['Game']['name'],  array('controller' => 'Games', 'action' => 'viewgame', 'id' => $game['Game']['id'])); ?>
	       			</td>
	       			<td><?php echo $game['Game']['created']; ?></td>
	       			<td>
			            <?php echo $this->Form->postLink(
			                'Supprimer',
			                array('action' => 'delete', $game['Game']['id']),
			                array('confirm' => 'Etes-vous sûr ?'));
			            ?>
			            <?php echo $this->Html->link(
			                'Editer',
			                array('action' => 'edit', $game['Game']['id'])
			            ); ?>
			        </td>
	    		</tr>
	    	<?php endforeach; ?>
	    	
	    	</table>
	    	<?php unset($game); ?>
   		</div>
	</div>	
</div>