<?php
	require_once 'header.php';

	$conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbname);
    if(!$conn){
        echo "Cannot connect database";
    }
    mysql_query("use $dbname");

	if(isset($_GET["pdname"]) && isset($_GET["price"]) && isset($_GET["pic"])) {
		$pdname = $_GET["pdname"];
		$price = $_GET["price"];
		$pic = $_GET["pic"];
	}

	$query = "SELECT Color FROM products WHERE ProductName='$pdname'";
	$result = mysql_query($query);
	while($show = mysql_fetch_array($result)) {
		$color = $show[0];
	}

	echo <<<_END
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
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
        	<form class="form-horizontal" method="post" action="addtobagComplete.php?pdname=$pdname&&price=$price&&pic=$pic&&color=$color" enctype="multipart/form-data">
_END;
?>
	<!--<script>
	function open_popup(url){
		window.open(url,null,"height=200,width=400,status=yes,toolbar=no,menubar=no,location=no");
	}
	</script>-->

	            <div class="col-lg-12">             
	            <br><br>
	                <div class="col-lg-6">
	                	<!--<img class="thumbnail" src="pictures/<?php echo $pic?>" style="width: 14%; height:72px; float: left;">-->
	                	<img class="thumbnail" src="pictures/<?php echo $pic?>" style="width: 84%; height:500px; float: right;">
	                </div>
	                <div class="col-lg-6">
	                	<h2><?php echo $pdname?></h2>
	                	<h4><?php echo $price?> THB</h4>
	                	<br>
	                	<h5>Color: <?php echo $color?></h5>
	                	<p><a href="#">Size Chart</a></p>	                
	                	<br>
	                	<h4>SELECT SIZE</h4>
	                	<div class="form-group">
	                		<select class="form-control" style="width: 20%; margin-left:15px;" name="size">
	                			<option value="6">6</option>
	                			<option value="6.5">6.5</option>
	                			<option value="7">7</option>
	                			<option value="7.5">7.5</option>
	                			<option value="8">8</option>
	                			<option value="8.5">8.5</option>
	                			<option value="9">9</option>
	                			<option value="9.5">9.5</option>
	                		</select>
	                	</div>
	                	<br>
	                	<h4>QUANTITY</h4>	                	
	                	<div class="form-group">
	                		<select class="form-control" style="width: 20%; margin-left:15px;" name="qty">
	                			<option value="1">1</option>
	                			<option value="2">2</option>
	                			<option value="3">3</option>
	                			<option value="4">4</option>
	                			<option value="5">5</option>	         
	                		</select>
	                	</div>
	                	<br>
	                	<button type="submit" class="btn btn-primary" value='bag'>ADD TO BAG</button>
	                </div>
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