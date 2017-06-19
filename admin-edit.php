<?php
include "functions.php";
include_once "admin-header.php";
$ProductID=$_GET['ProductID'];
if(!$ProductID){
	echo "CANNOT GET ProductID";
	echo "<meta http-equiv=\"refresh\" content=\"1; URL=admin.php\">";
	exit();
}
$sql="select * from products where ProductID=$ProductID limit 1";

if ($conn->query($sql) === TRUE) {
    printf("Successfully select\n");
}
if ($result1 = $conn->query($sql)) {
    $data = $result1->fetch_assoc() ;
	$result1->free();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Your Shoes Edit</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<br><br><br>
				<h3>Edit Product Details</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<form class="form-horizontal" method="post" action="admin-editComplete.php" enctype="multipart/form-data">
					<div class="form-group">
						<label for="inputAuthor" class="col-sm-3 control-label">Product ID : </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputProductID" name="ProductID" value="<?php echo $data['ProductID'];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputTitle" class="col-sm-3 control-label">Product Name : </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputProductName" name="ProductName" value="<?php echo $data['ProductName'];?>" required>
						</div>
					</div>		
					<div class="form-group">
						<label for="inputTitle" class="col-sm-3 control-label">Color : </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputColor" name="Color" value="<?php echo $data['Color'];?>" required>
						</div>
					</div>			
					<div class="form-group">
						<label for="inputYear" class="col-sm-3 control-label">Price : </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputPrice" name="Price" value="<?php echo $data['Price'];?>" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputName" class="col-sm-3 control-label">Size 6 : </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputSix" name="Six" value="<?php echo $data['Six'];?>" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputName" class="col-sm-3 control-label">Size 6.5 : </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputSixF" name="SixF" value="<?php echo $data['SixF'];?>" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputName" class="col-sm-3 control-label">Size 7 : </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputSeven" name="Seven" value="<?php echo $data['Seven'];?>" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputName" class="col-sm-3 control-label">Size 7.5 : </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputSevenF" name="SevenF" value="<?php echo $data['SevenF'];?>" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputName" class="col-sm-3 control-label">Size 8 : </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputEight" name="Eight" value="<?php echo $data['Eight'];?>" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputName" class="col-sm-3 control-label">Size 8.5 : </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputEightF" name="EightF" value="<?php echo $data['EightF'];?>" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputName" class="col-sm-3 control-label">Size 9 : </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputNine" name="Nine" value="<?php echo $data['Nine'];?>" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputPicture" class="col-sm-3 control-label">Product picture : </label>
						<div class="col-sm-9">
							<input type="file" class="form-control" id="inputPicture" name="Picture" value="<?php echo $data['Picture']['name'];?>" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3 col-md-offset-3">
							<a href="admin.php" class="btn btn-info">Back</a>
						</div>
						<div class="col-sm-3">
							<input type="submit" class="btn btn-success">
						</div>
					</div>
				</form>
			</div>
		</div>
		</div>
	</body>
	
	
	
</html>