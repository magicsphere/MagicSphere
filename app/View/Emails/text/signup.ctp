Bonjour,

Merci <?php  echo $username; ?>  pour vôtre inscription
Vous pouvez valider vôtre compte en vous rendant sur ce lien.
<?php $this->Html->url(array('controler' => 'users', action' => 'activate',$id, $token), true); ?>

Merci