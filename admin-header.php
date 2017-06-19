<?php // header.php //all project will access to the same data here
  session_start(); //sets up a session that will remember certain values we want stored across different PHP files

  echo "<!DOCTYPE html>\n<html><head>";

  require_once 'functions.php'; //so that this file is load only once by all pages

  if (isset($_SESSION['Email'])) //check whether session var "user" already assigned a value, if so, the user logged
  {
    $user     = $_SESSION['Email'];
    $userstr  = "$user";
  }

    echo <<<_END
        <meta charset="utf-8">
          <!-- Bootstrap Core CSS -->
          <link href="css/bootstrap.min.css" rel="stylesheet">

          <!-- Custom Fonts -->
          <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
 
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="navbar-brand"><img src="pictures/logo.png" style="width:110px"></span>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li><a href="admin.php">Stock</a></li>
                  <li><a href="#">Order</a></li>      
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="logout.php">$userstr&nbsp;<i class="fa fa-angle-double-left" aria-hidden="true"></i> LOGOUT &nbsp;
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>                                    
                    </li>                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
_END;
  

?>
