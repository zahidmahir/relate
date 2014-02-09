<!DOCTYPE html>
<html class="no-js">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title></title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width">
      <?php 
        echo $this->Html->meta('icon'); 
        echo $this->Html->css('bootstrap.min.css');
        echo $this->Html->css('bootstrap-theme.min.css');
        echo $this->Html->css('main.css');

        echo $this->Html->script('vendor/jquery-1.10.1.min.js');
        echo $this->Html->script('vendor/bootstrap.min.js');
        echo $this->Html->script('main.js');
        echo $this->Html->script('vendor/modernizr-2.6.2-respond-1.1.0.min.js');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
      ?>
  </head>
  <body>
    <br />
    <?php 
      if(empty($auth_user)) {
        if(substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], '/')) != '/splash') {
          header('Location: ' . $this->webroot . 'splash'); die;
        }
      }
    ?>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
          <a class="navbar-brand navbar-left" href="#">
            <span class="glyphicon glyphicon-home"></span>
          </a>
        <p class="navbar-text navbar-right">
          <?php
            if(!empty($auth_user)) {
              echo $auth_user['email'];
            }
          ?>
        </p>
      </div>
    </div>

    <div class="container">

      <div class="row">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
      </div>

      <hr>

      <footer>
        <p>&copy; Mahir - Rings 2014</p>
      </footer>
    </div> <!-- /container --> 
  </body>
</html>
