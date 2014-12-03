
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Site Template</title>

    <!-- Bootstrap core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    body {
      padding-top: 50px;
    }
    .starter-template {
      padding: 40px 15px;
      text-align: center;
    }
</style>
  </head>

  <body>

    <?php 
    /**
     * Require a Header
     */
    require_once('elements/header.php');
    ?>

    <div class="container">
    
    <?php 
      /**
       * Include a page template
       */
      $page_template = (isset($_GET['page']))? $_GET['page'] : 'home';
      $template_directory = __DIR__ . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR;
      $dir_file = $template_directory . $page_template . '.php';
      if(file_exists($dir_file))
      {
        require_once($dir_file);
      }else{
        //Include a 404 ERROR Page
        require_once($template_directory . 'error404.php');
      }


    ?>
  

    </div><!-- /.container -->
    
    <hr>
    <?php 
      /**
       * Require Footer
       */
      require_once('elements/footer.php');
     ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>
