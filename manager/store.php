 <?php
 		include_once('../connection.php');
		
		if(isset($_POST['save']))
		{
			$name = $_POST['products'];
			$course = $_POST['courses'];
			$price = $_POST['price'];
			$filename = $_FILES['img']['name'];
			$filetype = $_FILES['img']['type'];
			$filesize = $_FILES['img']['size'];
			$file_loc = $_FILES['img']['tmp_name'];
			$file_loc_up = "uploadedfiles/".$filename;
			if(empty($filename))
			{
				$filename='coldcoffee with icecream.jpg';
				
			}
	
			$sql = "insert into mainmenu(products,courses,price,p_image) values('$name','$course',$price,'$filename')";
			$res = mysqli_query($cn, $sql);
			move_uploaded_file($file_loc, $file_loc_up);
			
			header('Location:cuisinelist.php');
		}
?>
	