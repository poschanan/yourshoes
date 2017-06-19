<?php
include_once "functions.php";
include_once "admin-header.php";
$search=$_POST['searchQuery'];
if(!$search){
	echo "CANNOT POST searchQuery";
	echo "<meta http-equiv=\"refresh\" content=\"1; URL=admin.php\">";
	exit();
}

$sql="select * from products where ProductName like '%$search%'";

if ($conn->query($sql) === TRUE) {
    printf("Successfully select\n");
}
if ($result1 = $conn->query($sql)) {
	//tah gerd wa search mai jer mhai kwam wa row = 0
	if ($result1->num_rows == 0) {
		echo "<br><br><br><div class='alert alert-danger'><h4>Cannot find $search</h4></div>";
		echo "<meta http-equiv=\"refresh\" content=\"1; URL=admin.php\">";
		exit();
	}
	$data = $result1->fetch_assoc();
	$result1->free();
}    					
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Your Shoes</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
	<body>
		<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
					<div class="col-md-12">
						<br><br><br><br>
						<h2>Result for search: <?php echo $search?></h2>
						<br>
						<a href="admin.php" class="btn btn-info"> Back </a>						
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">							
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
