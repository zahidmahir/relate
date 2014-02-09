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
      <?php echo var_dump($auth_user); ?>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Relate</a>
        </div>
         
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <!-- <div class="jumbotron">
      <div class="container">
        <h1>Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg">Learn more &raquo;</a></p>
      </div>
    </div> -->

    <div class="container">

      <!-- Example row of columns -->
      <div class="row">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>

        <!-- <div class="col-lg-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
       </div>
        <div class="col-lg-4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
        </div> -->
      </div>

      <hr>

      <footer>
        <p>&copy; MahirRings 2014</p>
      </footer>
    </div> <!-- /container --> 
  </body>
</html>
