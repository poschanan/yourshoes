<?php
include "functions.php";
include_once "admin-header.php";

$ProductID=$_GET['ProductID'];

if($ProductID){
	$sql = "DELETE FROM products WHERE ProductID='$ProductID' LIMIT 1";
	echo "<br><br><br><div class='alert alert-success'>Delete Row ".($conn->query($sql)?"Complete":"Error".$sql)."<br></div>";	
}
?>
<meta http-equiv="refresh" content="3; URL=admin.php">