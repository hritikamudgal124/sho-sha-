<?php
include_once('../connection.php');
if(isset($_POST['save']))
{
	$mid = $_POST['mid'];
	$product = $_POST['products'];
	$course = $_POST['courses'];
	$filename = $_FILES['img']['name'];
	$filetype = $_FILES['img']['type'];
	$filesize = $_FILES['img']['size'];
	$file_loc = $_FILES['img']['tmp_name'];
	$file_loc_up = "uploadedfiles/".$filename;
		if($filename)
		{
			move_uploaded_file($file_loc, $file_loc_up);
		}
	$price = $_POST['price'];

	$sqlupd = "update mainmenu set p_image='$filename',products='$product',courses='$course',price='$price' where mid=$mid";
	mysqli_query($cn, $sqlupd);
	header('Location:cuisinelist.php');
 }

?>