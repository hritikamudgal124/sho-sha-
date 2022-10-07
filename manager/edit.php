<?php
include('header.php');
include('testsession.php');
include('timesession.php');
include_once('../connection.php');

	//echo "time_stamp";
	$mid = $_GET['mid'];
	$sql = "select * from mainmenu where mid=$mid";
	$res = mysqli_query($cn, $sql);
	$data = mysqli_fetch_array($res);
?>

<div style="border:3px solid #5c0a05; padding: 100px; text-align: center; font-size: 18px; ">
	<form action="update.php" method="post" enctype="multipart/form-data">
		<label> CISINE ID</label><br/>
		<input type="text" name="mid" value="<?php echo $data['mid']?>" readonly="true"><br/><br/>
		<label>CUISINE NAME</label><br/>
		<input type="text" name="products" value="<?php echo $data['products']?>" ><br/><br/>

		<label>SELECT COURSE</label><br/>
		<select name="courses" value="<?php echo $data['courses']?>">
			<option>Course</option>
			<option>Starter</option>
			<option>Main course</option>
			<option>Dessert</option>
			<option>Drinks</option>
		</select><br/><br/>
		<label>Choose Image File</label>
		<br/>
		<input type="file" name="img" value="<?php echo $data['image']?>">
		<br/><br/>
		<label>PRICE</label><br/>
		<input type="text" name="price" value="<?php echo $data['price']?>"><br/><br/>

		<input type="submit" name="save" value="save">
		<input type="reset" name="reset" value="cancel">
	</form>
</div>
	



