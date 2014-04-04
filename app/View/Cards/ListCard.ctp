<div class="row">
	<div class="span12">
		<hi>Liste des cartes Magic The Gathering</h1>
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>Nom</th>
						<th>Crée le</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
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
				                array('confirm' => 'Etes-vous sûr de vouloir supprimer cette carte ?'));
				            ?>
				            <?php echo $this->Html->link(
				                'Editer',
				                array('action' => 'Addcard', $card['Card']['id'])
				            ); ?>
				        </td>
		    		</tr>
		    	<?php endforeach; ?>
	    		</tbody>
	    	</table>
	    	<?php unset($card); ?>
   		</div>
	</div>	
</div>