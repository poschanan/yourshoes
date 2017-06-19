<?php
include_once 'functions.php';
require_once 'header.php';

if(isset($_GET["pdname"]) && isset($_GET["price"]) && isset($_GET["pic"]) && isset($_GET["color"])) {
	$pdname = $_GET["pdname"];
	$price = $_GET["price"];
	$pic = $_GET["pic"];
	$color = $_GET["color"];
}

$size 	= $_POST['size'];
$qty 	= $_POST['qty'];

$total 	= $price*$qty;

$sql="insert into bag(ProductName,Picture,Price,Color,Size,QtyBuy,Total) values('$pdname','$pic','$price','$color','$size','$qty','$total')";

echo "<br><br>";
//echo "<div class='alert alert-success'> Add to MY BAG ".($result = $conn->query($sql)?"Complete":"Error".$sql)."<br>";

$result = $conn->query($sql);
if($result) {
	echo "<div class='alert alert-success'>Add to MY BAG Complete.";
}
else {
	echo "<div class='alert alert-danger'>This product already exist.";
}

echo "";
?>
<meta http-equiv="refresh" content="3; URL=mybag.php">
