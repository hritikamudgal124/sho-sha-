<?php
include('header.php');
include('testsession.php');
include('timesession.php');
include_once('../connection.php');
?>
<form action="" method="post" style="font-size: 17px; text-align: center; padding: 100px; border:3px solid #5c0a05;">

	<label>WHAT YOU WANT TO EAT TODAY </label><br/>
	<select name="pname">
		<?php
			$sql = "select products from mainmenu";
			$res = mysqli_query($cn,$sql);
			foreach ($res as $list)
			{
				echo "<option value=".$list['products'].">".$list['products']."</option>";
			}
		?>
	</select><br/><br/>

	<label>QUANTITY</label>&nbsp;&nbsp;
	<select name="qty">
		<script>
			var i;
			for(i=1;i<=10;i++)
			{
				document.write("<option>"+i+"</option>");
			}
		</script>
	</select><br/><br/>

	<label>TABLE NO.</label>&nbsp;&nbsp;
	<select name="tbl">
		<script>
			var i;
			for(i=1;i<=10;i++)
			{
				document.write("<option>"+i+"</option>");
			}
		</script>
	</select><br/><br/>
	<input type="submit" name="save" value="Place order">
	<input type="reset" name="reset" value="Cancel">
</form>

<?php
		if(isset($_POST['save']))
		{
			$pname = $_POST['pname'];
			$qty = $_POST['qty'];
			$tbl = $_POST['tbl'];
			$sql_ins="insert into porders(pname,quantity,tableno) values('$pname',$qty,$tbl)";
			$res= mysqli_query($cn,$sql_ins);
			header('location:duebills.php');
		}

	?>