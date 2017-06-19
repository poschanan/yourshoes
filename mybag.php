<?php
	require_once 'header.php';
	require_once 'functions.php';
	
    $conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbname);
    if(!$conn){
        echo "Cannot connect database";
    }
    mysql_query("use $dbname");
 
    $check = "select * from bag";
    $result  = mysql_query($check) or die(mysql_error());
    $num = mysql_num_rows($result);	

  	if ($num == 0) {
  		echo <<<_END
    	<body>
		<br><br><br>
		<div class="container">
        	<div class="row">
        	<form class="form-horizontal" method="post" action="index.php" enctype="multipart/form-data">
	            <div class="col-lg-12" style="margin-top:150px; margin-bottom:300px;">
	            	<center><h1>Y O U R &nbsp; B A G &nbsp; is empty.</h1>
	            	<br><br>	            	
	            	<button type="submit" class="btn btn-primary" style="width:18%">Continue Shopping</button></center>
	            </div>
	        </form>
	    </body>
_END;
  	}
  	else {
  		if ($num == 1) {
  			$unit = "item";
  		}
  		if ($num > 1) {
  			$unit = "items";
  		}
	echo <<<_END
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Your shoes</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
	<body>
		<br><br><br>
		<div class="container">
        	<div class="row">
        	<form class="form-horizontal" method="post" action="checkout.php" enctype="multipart/form-data">
	            <div class="col-lg-12">	               
	            	<br>
	            	<span style="font-size:36px; font-weight;">M Y &nbsp; B A G &nbsp;</span>
	            	<span style="font-size:20px;">($num $unit)</span>
	            	<br><br>	            	
	                <div class="col-lg-8">
_END;
	
	$sub = 0;
	$tot = $sub;

	$query = "SELECT ProductName,Picture,Color,Size,QtyBuy,Total FROM bag";
  	$data = mysql_query($query);
  	while($show = mysql_fetch_array($data)){
  		$sub += $show[5];
  		$tot = number_format($sub);
	
	echo <<<_END
	                <div class="col-lg-12 thumbnail">	                	
	                	<div class="col-lg-3" style="margin-top:8px; margin-bottom:8px;">
	                		<center><img src="pictures/$show[1]" style="width: 95%; height:140px;"></center>
	                	</div>
	                	<div class="col-lg-8">
	                		<h3>$show[0]</h3>
	                		<div class="col-lg-6">	                		
	                			<br>
	                			<p>Color: $show[2]</p>
	                			<p>Size: $show[3]</p>	                				                			
	                		</div>
	                		<div class="col-lg-6">
	                			<br>	                		
	                			<p>Quantity: $show[4]</p>
	                			<p>Total: $show[5]</p>
	                		</div>
	                	</div>
	                	<div class="col-lg-1">	                		
	                		<a href="deletefrombag.php?pdname=$show[0]"><span class="glyphicon glyphicon-remove" aria-hidden="true" style="margin-top:20px;"></span></a>
	                	</div>
	                </div>
_END;
}

	echo <<<_END
	              </div>
	              <div class="col-lg-3 thumbnail" style="margin-left:25px; background-color:#f0f0f0">
	                	<center><h3>ORDER SUMMARY</h3></center>
	                	<div class="col-lg-4" style="text-align:right; margin-left:28px;">
	                		<p>Subtotal</p>
	                		<p>Delivery</p>
	                		<p><b>Total</b></p>
	                	</div>
	                	<div class="col-lg-5" style="text-align:right">
	                		<p>$sub THB</p>
	                		<p>FREE</p>
	                		<p><b>$tot THB</b></p>
	                	</div>
	                	<center><button type="submit" class="btn btn-primary" value='bag' style="width:80%">CHECK OUT</button></center>
	                	<br>
	                </div>  
	            </div>
	            </form>
        	</div>
        </div>
_END;
}
?>
        <br><br><br>
        <center><hr style="width:85%;"></center>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <p>Copyright &copy; Your Shoes 2016</p>
                </div>
            </div>
            </div>
            <!-- /.row -->
        </footer>

	</body>
</html>