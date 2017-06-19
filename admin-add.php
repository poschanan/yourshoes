<?php
	include_once "admin-header.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Your Shoes Admin Edit</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
	<body>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<br><br><br>
				<h3>Add New Product</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<form class="form-horizontal" method="post" action="admin-addComplete.php" enctype="multipart/form-data">
					<div class="form-group">
						<label for="inputName" class="col-sm-3 control-label">Product ID : </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputID" name="ProductID" placeholder="ID">
						</div>
					</div>
					<div class="form-group">
						<label for="inputName" class="col-sm-3 control-label">Product Name : </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputName" name="ProductName" placeholder="Name" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputColor" class="col-sm-3 control-label">Color : </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputColor" name="Color" placeholder="Color" required>
						</div>
					</div>					
					<div class="form-group">
						<label for="inputPrice" class="col-sm-3 control-label">Price : </label>						
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputPrice" name="Price" placeholder="Price" required>
						</div>						
					</div>
					<div class="form-group">
						<label for="inputSize" class="col-sm-3 control-label">Size 6 : </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputSix" name="Six" placeholder="Quantity" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputSize" class="col-sm-3 control-label">Size 6.5 : </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputSixF" name="SixF" placeholder="Quantity" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputSize" class="col-sm-3 control-label">Size 7 : </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputSeven" name="Seven" placeholder="Quantity" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputSize" class="col-sm-3 control-label">Size 7.5 : </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputSevenF" name="SevenF" placeholder="Quantity" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputSize" class="col-sm-3 control-label">Size 8 : </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputEight" name="Eight" placeholder="Quantity" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputSize" class="col-sm-3 control-label">Size 8.5 : </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputEightF" name="EightF" placeholder="Quantity" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputSize" class="col-sm-3 control-label">Size 9 : </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputNine" name="Nine" placeholder="Quantity" required>
						</div>
					</div>	
					<div class="form-group">
						<label for="inputPicture" class="col-sm-3 control-label">Upload product picture : </label>
						<div class="col-sm-9">
							<input type="file" class="form-control" id="inputPicture" name="Picture" required>
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
	</body>
</html>