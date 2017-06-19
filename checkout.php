<?php
	require_once 'header.php';

	if (!$loggedin) {
		die("<div class='alert alert-danger'>".
          "<br><br><br>Please log in. ".
            "</div><meta http-equiv='refresh' content='3; URL=login.php'>");
	} 

	$connection = mysql_connect($dbhost, $dbuser, $dbpass, $dbname);
    if(!$connection){
        echo "Cannot connect database";
    }
    mysql_query("use $dbname");

	echo <<<_END
<!DOCTYPE html>
<html>
<head>
	<title>Your Shoes</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<form class="form-horizontal" method="post" action="placeorder.php" enctype="multipart/form-data">
				<br><br><br><br>
				<center><h2>ORDER SUMMARY</h2></center><br>
_END;

	$sub = 0;
	$tot = $sub;

	$query = "SELECT ProductName,Picture,Color,Size,QtyBuy,Total FROM bag";
  	$data = mysql_query($query);
  	while($show = mysql_fetch_array($data)){
  		$sub += $show[5];
  		$tot = number_format($sub);
	
		echo <<<_END
		     <div class="col-lg-8 col-lg-offset-2">     	
	            <div class="col-lg-3">
	                <img src="pictures/$show[1]" style="width: 85%; height:130px; float:right;">
	            </div>
	            <div class="col-lg-9">
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
	            	<hr style="width:100%; border-width:2px;">  
	            </div>	 
	                     
	         </div>
_END;
}
	   echo<<<_END
			<div class="col-lg-6 col-lg-offset-2" style="text-align:right">
				<h4>Grand Total: <b>$tot THB</b></h4>
				<p>(cash on delivery)</p>
			</div>              
			<div class="col-lg-12" style="text-align:center">
				<br><br>
				<h2>DELIVERY ADDRESS <a href="#">
				<span class="glyphicon glyphicon-pencil" aria-hidden="true" style="font-size:0.8em">
				</a></span></h2><br>
_END;

	$sql = "SELECT Email,FirstName,LastName,PhoneNumber,Address,City,District,PostCode FROM users WHERE Email='$user'";
  	$result = mysql_query($sql);
  	while($row = mysql_fetch_array($result)){

  		echo <<<_END
  		<div class="col-lg-12">
  			<div class="col-lg-4 col-lg-offset-4 thumbnail">
  				<br>
  				<h4>$row[1] $row[2]</h4>
  				<h4>$row[0]</h4>
  				<h4>$row[3]</h4>
  				<h4>$row[4] $row[6]</h4>
  				<h4>$row[5] $row[7]</h4>
  				<br>
  			</div>
  		</div>
_END;
}			
?>			
			<button type="submit" class="btn btn-primary" value='bag' style="width:20%; margin-top:20px;">PLACE ORDER</button>
			</div>
			</form>
		</div>
	</div>
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