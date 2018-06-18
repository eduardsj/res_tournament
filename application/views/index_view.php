<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Football Outcomes</title>

    <!-- Bootstrap core CSS -->
    <link href="html/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="html/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="html/css/grayscale.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Top of page</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#credata">Create sql data</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#view_data">View results</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>

    <!-- Intro Header -->
    <header class="masthead">
      <div class="intro-body">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h1 class="brand-heading">Sport results outcome</h1>
              <p class="intro-text">Designed for Mogo
                <br>Modified Start Bootstrap theme.</p>
              <a href="#credata" class="btn btn-circle js-scroll-trigger">
                <i class="fa fa-angle-double-down animated"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Create Data Section -->
    <section id="credata" class="content-section text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2>Create sql data</h2>
            <p>Create sql sample auto populate data.</p>
            <a href="<?php  echo base_url();?>initial/make" class="btn btn-default btn-lg">Create sql data</a>
          </div>
        </div>
      </div>
    </section>

    <!-- View Section -->
    <section id="view_data" class="download-section content-section text-center">
      <div class="container">
        <div class="col-lg-8 mx-auto">
          <h2>View results</h2>
            <?php if(sizeof($finalRes)> 0):?>
                <?php foreach($finalRes as $res):?>
                    <p><?=$res?></p>
                <?php endforeach;?>    
            <?php else:?>
                <p>Nav rezultātu</p>      
            <?php endif;?> 
        </div>
      </div>
    </section>


    <!-- Footer -->
    <footer>
      <div class="container text-center">
        <p>Copyright &copy; Eduards Jašs 2018</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="html/vendor/jquery/jquery.min.js"></script>
    <script src="html/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="html/vendor/jquery-easing/jquery.easing.min.js"></script>

   
    <!-- Custom scripts for this template -->
    <script src="html/js/grayscale.js"></script>

  </body>

</html>
