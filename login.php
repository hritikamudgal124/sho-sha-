<?php
include('header.php');
?>
<div style="border:2px solid black; text-align: center; padding:80px; font-size: 18px;">
	<h2>LOGIN HERE</h2>
	<form action="" method="post">
		<label>CHOOSE USERTYPE</label>
		<select name="utype">
			<option>MANAGER</option>
			<option>CHEF</option>
			<option>BUTLER</option>
		</select><br/><br/>
		<input type="text" name="username" placeholder="ENTER YOUR USERNAME"><br/><br/>
		<input type="password" name="pass" placeholder="ENTER YOUR PASSWORD"><br/><br/>
		<input type="submit" name="save" value="login">
		<input type="reset" name="reset" value="cancel">
	</form>
</div>
</body>
<?php
if(isset($_POST['save']))
{
	$uname = $_POST['username'];
	$pass = $_POST['pass'];
	include_once('connection.php');
	$sql = "select * from users where username='$uname' and password='$pass'";
	$res = mysqli_query($cn,$sql);
	$data = mysqli_fetch_array($res);
	
	if($res)
	{
		if($uname==$data['username'] and $pass==$data['password'])
		{
			session_start();
			$_SESSION['ssuser'] = $uname;
			$_SESSION['time_stamp'] = time();
			header('Location:manager/dashboard.php');
		}
		else
		{
			?>
			<script>
				alert("Login Failed.");
			</script>
			<?php
			mysqli_close($cn);
		}
	}


}
?>
</html>