<?php
include "functions.php";
include_once "admin-header.php";

$ProductID 		= $_POST['ProductID'];
$ProductName 	= $_POST['ProductName'];
$Color			= $_POST['Color'];
$Price			= $_POST['Price'];
$Six 			= $_POST['Six'];
$SixF 			= $_POST['SixF'];
$Seven 			= $_POST['Seven'];
$SevenF 		= $_POST['SevenF'];
$Eight			= $_POST['Eight'];
$EightF 		= $_POST['EightF'];
$Nine			= $_POST['Nine'];
$Picture		= $_FILES['Picture']['name'];

$sql = "update products set ProductID='$ProductID', ProductName='$ProductName', Color='$Color', Price='$Price', 
                            Six='$Six', SixF='$SixF',Seven='$Seven', SevenF='$SevenF',Eight='$Eight', EightF='$EightF', Nine='$Nine',
                            Picture='$Picture' where ProductID='$ProductID' limit 1";
echo "<br><br><br><div class='alert alert-success'>Edit row ".($result = $conn->query($sql)?"Complete":"Error".$sql)."<br></div>";

$target_dir = "pictures/";
	$target_file = $target_dir . basename($_FILES["Picture"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["Picture"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["Picture"]["size"] > 500000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["Picture"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["Picture"]["name"]). " has been uploaded.";
			echo "<p>You have uploaded</p>";
			echo "<img src=".$target_file.">";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}

?>
<meta http-equiv="refresh" content="3; URL=admin.php">

