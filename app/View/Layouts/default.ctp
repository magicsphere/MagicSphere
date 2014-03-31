<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MagicSphere</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <?php echo $this->Html->css('bootstrap'); ?>
    <?php echo $this->Html->css('bootstrap-responsive'); ?>

    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 0px;
      }
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">      
      <div class="navbar-inner">  
        <div class="container">
          <a href="/" class="brand"><img alt="" src="/logo.gif" />
           <?php echo $this->Html->image("me_LogoGrNewTest.gif", array("alt" => "Magicsphere", 'url'=>'/')); ?> 
           </a>
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#"><i class="icon-home icon-white"></i>Home</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Magic<b class="caret"></b></a>
                <ul class="dropdown-menu"><li>
                  <?php echo $this->Html->link('Cards',array('controller' => 'Cards', 'action' => 'Listcard', 'id' => 1)); ?>
                  </li>
                  <li><a href="#">Editions</a></li>
                  <li><a href="#">Illustrateurs</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Divers</li>
                  <li><a href="#">Lexicon</a></li>
                  <li><a href="#">Tournament</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pokémon<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li>
                   <?php echo $this->Html->link('Cards',array('controller' => 'Cards', 'action' => 'Listcard', 'id' => 2)); ?>
                  </li>
                  <li><a href="#">Editions</a></li>
                  <li><a href="#">Illustrateurs</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Wakfu<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Cards</a></li>
                  <li><a href="#">Editions</a></li>
                  <li><a href="#">Illustrateurs</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">World of Warcraft<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Cards</a></li>
                  <li><a href="#">Editions</a></li>
                  <li><a href="#">Illustrateurs</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Yu-Gi-Oh!<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Cards</a></li>
                  <li><a href="#">Editions</a></li>
                  <li><a href="#">Illustrateurs</a></li>
                </ul>
              </li>
            </ul>
            <!--nocache-->
            <?php if($this->Session->read('Auth.User.id')){ ?>     
              <ul class="nav pull-right">
                <li><?php echo $this->html->link('Mon compte', array('controller' => 'Users', 'action' => 'account')); ?></li>
                <li><?php echo $this->html->link('Se déconnecter', array('controller' => 'Users', 'action' => 'logout')); ?></li>
              </ul>
            <?php }else{ 
              echo $this->Form->create('User', array('Class' => 'navbar-form pull-right', 'action' => 'login'));
              echo $this->Form->input('username', array('label' => false, 'div' => false, 'placeholder' => 'Email', 'class' => 'span2'));
              echo $this->Form->input('password', array('label' => false, 'div' => false, 'placeholder' => 'Mot de pass', 'class' => 'span2', 'type' => 'password'));
              ?>
                  <button class="btn" type="submit" >Se connecter</button>
             <?php 
              echo $this->Form->end();
             } ?>
            <!--/nocache-->
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div style="margin-top: 150px;">
        <div class="container">
          <div class="row">

            <?php echo $this->Session->flash(); ?>
            <?php echo $this->Session->flash('Auth'); ?>
            <?php echo $this->fetch('content'); ?>

          </div>

          <hr>

        </div>
    </div>
    <?php echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'); ?>
    <?php echo $this->Html->script('bootstrap'); ?>
    <?php echo $this->Html->script('cakebootstrap'); ?>


  </body>
</html>
