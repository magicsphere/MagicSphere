Bonjour,

Merci <?php echo $username ?> pour votre inscription

Vous pouves valider votre compte en cliquant sur le lien ci-dessous :

<?php 
	echo $this->Html->url(
		array(
				'controller'=> 'users',				
				'action' => 'activate',
				$id,
				$token		
			), 
			true
		); 
?>

Merci