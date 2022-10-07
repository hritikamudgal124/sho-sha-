<?php
include('header.php');
include('testsession.php');
include('timesession.php');
?>

<div style="border:3px solid #5c0a05; padding: 100px; text-align: center; font-size: 18px; ">
	<form action="store.php" method="post" enctype="multipart/form-data">
		<label>CUISINE NAME</label><br/>
		<input type="text" name="products"><br/><br/>

		<label>SELECT COURSE</label><br/>
		<select name="courses">
			<option>Starter</option>
			<option>Main course</option>
			<option>Dessert</option>
			<option>Drinks</option>
		</select><br/><br/>
		<label>Choose Image File</label>
		<br/>
		<input type="file" name="img">
		<br/><br/>
		<label>PRICE</label><br/>
		<input type="text" name="price"><br/><br/>

		<input type="submit" name="save" value="save">
		<input type="reset" name="reset" value="cancel">
	</form>
</div>
	



