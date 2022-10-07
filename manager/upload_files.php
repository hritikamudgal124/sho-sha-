<?php 
	if(isset($_POST['upload']))
	{
		//print_r($_FILES['img']);
		//exit();
		$filename = $_FILES['img']['name'];
		$filetype = $_FILES['img']['type'];
		$filesize = $_FILES['img']['size'];
		$file_loc = $_FILES['img']['tmp_name'];
		$file_loc_up = "uploadedfiles/".$filename;
		if($filesize<=200000)
		{
			move_uploaded_file($file_loc, $file_loc_up);
		}
		else
		{
		?>
		<script>
			alert("File size exceed");
		</script>
		<?php
		}
	}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>upload eg</title>
 </head>
 <body>
 	<form action="" method="post" enctype="multipart/form-data">
 		<label>Choose File</label>
 		<br/>
 		<input type="file" name="img"/>
 		<br/>
 		<input type="submit" name="upload" value="Upload Image"/>
 	</form>
 </body>
 </html>