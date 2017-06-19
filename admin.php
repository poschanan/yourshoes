<?php
	session_start();
	include_once "functions.php";
	include_once "admin-header.php";
	$sql="select * from products";

	if($_SESSION['Email'] == "") {
		//echo "Please Login!";
		//exit();
		die("<div class='alert alert-danger'>".
          "Please Login!".
            "</div><meta http-equiv='refresh' content='3; URL=index.php'>");
	}
	if($_SESSION['Status'] != "ADMIN") {
		//echo "This page for Admin only!";
		//exit();
		die("<div class='alert alert-danger'>".
          "This page for Admin only!".
            "</div><meta http-equiv='refresh' content='3; URL=index.php'>");
	}

	mysql_connect("localhost","root","");
  	mysql_select_db("yourshoes");

  	if (isset($_POST['Email']))
  	{
	    $Email = sanitizeString($_POST['Email']);
	    $Password = sanitizeString($_POST['Password']);

	  	$strSQL = "SELECT * FROM users WHERE Email = '".mysql_real_escape_string($_POST['Email'])."'and Password = '".mysql_real_escape_string($_POST['Password'])."'";
	  	$objQuery = mysql_query($strSQL);
	  	$objResult = mysql_fetch_array($objQuery);
  	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Your Shoes Admin</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
<script>
function confirmDelete(value){
	if(confirm('Are you sure to delete this entry?')==true)
		window.location = 'admin-delete.php?ProductID='+value;
	else
		alert('You select to cancel.');
}
</script>

</head>
	<body>
		<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
					<div class="col-md-12">
					<br>
						<h2>Your Shoes: Stock</h2>
						<br>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">		
						<div class="col-md-8">			
							<a href="admin-add.php" class="btn btn-success">Add new product</a>
							<h4>Product Name must start at <b>Adidas</b> or <b>Nike</b> or <b>Converse</b>.</h4>
						</div>
						<div class="col-md-4">
							Search for product by name:	
							<div class="form-inline">					
								<form action="admin-search.php" method="post"> 							
									<input type="search" class="form-control" name="searchQuery" placeholder="adidas, nike, converse">			
									<button type="submit" class="btn btn-success">Search</button>							
								</form>
							</div>
						</div>						
						
						<table class="table table-striped table-hover">
							<tr>
								<th>ProductID</th>
								<th>ProductName</th>
								<th>Color</th>
								<th>Price</th>
								<th>Size 6</th>
								<th>Size 6.5</th>
								<th>Size 7</th>
								<th>Size 7.5</th>
								<th>Size 8</th>
								<th>Size 8.5</th>	
								<th>Size 9</th>									
								<th>Picture</th>
								<th>Action</th>
							</tr>
							<?php							
							if ($result = $conn->query($sql)) {

    						/* fetch associative array */
    						while ($data = $result->fetch_assoc()) {
							//while($data=mysql_fetch_assoc($query)){
								echo "<tr>
								<td>".$data['ProductID']."</td>
								<td>".$data['ProductName']."</td>
								<td>".$data['Color']."</td>
								<td>".$data['Price']."</td>
								<td>".$data['Six']."</td>
								<td>".$data['SixF']."</td>
								<td>".$data['Seven']."</td>
								<td>".$data['SevenF']."</td>
								<td>".$data['Eight']."</td>	
								<td>".$data['EightF']."</td>
								<td>".$data['Nine']."</td>							
								<td>".$data['Picture']."</td>
								<td><a href='admin-edit.php?ProductID=".$data['ProductID']."' class='btn btn-warning'>Edit</a>
								<a href='#' class='btn btn-danger' onclick='confirmDelete(".$data['ProductID'].")'>Delete</a>
								</tr>";
								}
							/* free result set */
    						$result->free();
    					}
							?>
						</table>												
						
					</div>
				</div>
			</div>
		</div>
		</div>
	</body>
</html>
