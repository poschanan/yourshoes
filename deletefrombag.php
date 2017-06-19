<?php
include "functions.php";
require_once 'header.php';

if(isset($_GET["pdname"])) {
		$pdname = $_GET["pdname"];
}

if($pdname){
	$sql = "DELETE FROM bag WHERE ProductName='$pdname' LIMIT 1";
	
	$result = $conn->query($sql);
	if($result) {
		echo "<br><br><br><div class='alert alert-success'>Delete Product Complete.";
	}
	else {
		echo "<br><br><br><div class='alert alert-danger'>"."Error ".$sql;
	}
}
?>
<meta http-equiv="refresh" content="3; URL=mybag.php">