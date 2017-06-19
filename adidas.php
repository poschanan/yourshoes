<?php
  require_once 'header.php';
    
    $conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbname);
    if(!$conn){
        echo "Cannot connect database";
    }
    mysql_query("use $dbname");
    // mysql_query("SET character_set_results=utf8");
    // mysql_query("SET character_set_client=utf8");
    // mysql_query("SET character_set_connection=utf8");

    echo <<<_END
    <!DOCTYPE html>
    <html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Your Shose - Adidas</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>    

    <!-- Page Content -->
    <div class="container">
        <div class="row">           
            <div class="col-md-12">
                <div class="row carousel-holder">
                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">                                                     
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="pictures/adidas-banner.jpg" alt="" style="height: 150px;">
                                </div>                                                            
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

_END;

    echo "<div class='container'>".
        "<div class='row'>".
        "<div class='col-md-12'>".
        "<div class='row'>";

  $query = "select ProductName,Price,Picture from products where ProductName like 'Adidas%'";
  $data = mysql_query($query);
  while($show = mysql_fetch_array($data)){
    //$show[0]." ".$show[1]." ".$show[2]." ";
    //$show[1] = number_format($show[1]);
    
    echo <<<_END
        <div class="col-md-3">        
        <div class="thumbnail">
            <a href="details.php?pdname=$show[0]&&price=$show[1]&&pic=$show[2]">
                <img src='pictures/$show[2]' alt="" style="width: 320px; height: 300px;"></a>
            <div class="caption" style="height: 75px;">
                <h4>$show[0]</h4>
                <h4>$show[1] THB</h4>
            </div>                            
        </div>
    </div>
_END;
  }
  
  echo "</div></div></div></div>";

?>

    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Shoes 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
