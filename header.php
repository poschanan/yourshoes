<?php // header.php //all project will access to the same data here
  session_start(); //sets up a session that will remember certain values we want stored across different PHP files

  echo "<!DOCTYPE html>\n<html><head>";

  require_once 'functions.php'; //so that this file is load only once by all pages

  echo <<<_END
          <!-- Bootstrap Core CSS -->
          <link href="css/bootstrap.min.css" rel="stylesheet">

          <!-- Custom Fonts -->
          <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
_END;

  //$userstr = ' (Guest)';

  if (isset($_SESSION['Email'])) //check whether session var "user" already assigned a value, if so, the user logged
  {
    $user     = $_SESSION['Email'];
    $loggedin = TRUE;
    $userstr  = "$user";
  }
  else $loggedin = FALSE;
    

  if ($loggedin)
  {
    echo <<<_END
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
                <a class="navbar-brand" href="index.php"><img src="pictures/logo.png" style="width:110px"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">        
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">BRANDS <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="adidas.php">Adidas</a></li>
                      <li><a href="nike.php">Nike</a></li>
                      <li><a href="converse.php">Converse</a></li>
                    </ul>
                  </li>
                </ul>
                <form class="navbar-form navbar-left" role="search" action="search.php" method="post">                
                  <div class="form-group input-group">
                      <input type="text" class="form-control" name="search" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            </button>
                        </span>
                  </div>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="logout.php">$userstr&nbsp;<i class="fa fa-angle-double-left" aria-hidden="true"></i> LOGOUT &nbsp;
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>                       
                    </li>
                    <li>
                        <a href="mybag.php">MY BAG  &nbsp; <i class="fa fa-shopping-bag"></i></a>                        
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
_END;
  }
  else
  {
    echo <<<_END
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
                <a class="navbar-brand" href="index.php"><img src="pictures/logo.png" style="width:110px"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">        
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">BRANDS <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="adidas.php">Adidas</a></li>
                      <li><a href="nike.php">Nike</a></li>
                      <li><a href="converse.php">Converse</a></li>
                    </ul>
                  </li>
                </ul>
                <form class="navbar-form navbar-left" role="search" action="search.php" method="post">                
                  <div class="form-group input-group">
                      <input type="text" class="form-control" name="search" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            </button>
                        </span>
                  </div>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="login.php">LOGIN &nbsp;
                        <i class="fa fa-user-secret fa-lg" aria-hidden="true"></i></a>                       
                    </li>
                    <li>
                        <a href="mybag.php">MY BAG  &nbsp; <i class="fa fa-shopping-bag"></i></a>                        
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
_END;
  }

?>
