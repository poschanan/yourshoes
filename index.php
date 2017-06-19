<?php //index.php
  require_once 'header.php'; //show view of the index page
  
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Your Shoes</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/full-slider.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Full Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url(pictures/slidenike.jpg);"></div>
                <div class="carousel-caption">
                    <!--<h2>Caption 1</h2>-->
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url(pictures/slideadidas.jpg);"></div>
                <div class="carousel-caption">                    
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url(pictures/slideconverse.jpg);"></div>
                <div class="carousel-caption">                  
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>
<!--
    
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1>Full Slider by Start Bootstrap</h1>
                <p>The background images for the slider are set directly in the HTML using inline CSS. The rest of the styles for this template are contained within the <code>full-slider.css</code>file.</p>
            </div>
        </div>

        <hr>

        
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Shoes 2016</p>
                </div>
            </div>
            
        </footer>

    </div>
-->
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>

<!--
<?php //index.php
  require_once 'header.php'; //show view of the index page

  echo "<br><span class='main'>Welcome to $appname,";

  if ($loggedin) echo " $user, you are logged in.";
  else           echo ' please sign up and/or log in to join in.';
?>
-->

