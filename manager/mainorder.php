<?php
include('header.php');
include('testsession.php');include('timesession.php');
include_once('../connection.php');
$sql = "select * from mainmenu order by products";
$res = mysqli_query($cn,$sql);
?>

<div style="font-size: 17px; text-align: center; padding: 100px; border:3px solid #5c0a05;">
<form action="" method="post">
	<label>DATE</label><br/>
	<input type="text" name="odate"><br/><br/>

	<label>TABLE NO</label><br/>
	<select name="tblno">
		<option>Table no</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
	</select><br/><br/>

	<label>SELECT CUISINE</label><br/>
	<select name="pname">
	<?php
		foreach ($res as $list)
			{
				echo "<option value=".$list['products'].">".$list['products']."</option>";
			}
	?>
	</select><br/><br/>
	<label>RATE</label><br/>
	<input type="text" name="rate">
	<br/>

	<label>QUANTITY</label><br/>
	<input type="text" name="qty">
	<br/><br/>
	
	<input type="submit" name="save" value="Add">
	<input type="submit" name="placeorder" value="Finish">

</form>
</div>

<div>
	<table  class="table table-active">
		<tr>
			<th>Cuisine </th>
			<th>Quantity</th>
			<th>Price</th>
			<th colspan="2">Actions</th>
		</tr>	
		<?php
			$sql = "select * from order_temp";
			$r = mysqli_query($cn,$sql);
			foreach ($r as $list)
			{
				echo "<tr>";
				echo "<td>".$list['pname']."</td>";
				echo "<td>".$list['qty']."</td>";
				echo "<td>".$list['price']."</td>";
				echo "<td><a href='orderdel.php?pname=".$list['pname'];
				echo "' class = 'btn btn-danger' onclick='return del_alert();'>Delete</a></td>";
				echo "</tr>";
			}
		?>
	</table>
</div>

<?php
	if(isset($_POST['save']))
	{
		$pname = $_POST['pname'];
		$qty = $_POST['qty'];
		$tbl = $_POST['tblno'];
		$rate = $_POST['rate'];
		$sql_ins = "insert into order_temp(pname,qty,price,tableno) values('$pname',$qty,$rate,$tbl)";
		$sendorder = mysqli_query($cn,$sql_ins);
		if ($sendorder)
		{
			?>
			<script type="text/javascript">
				var timer = setTimeout(function()
				{
					window.location='mainorder.php'
				},1000);
			</script>	
			<?php		
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("order not succ");
			</script>
			<?php
		}

	}

	
if(isset($_POST['placeorder']))
{
	$ordate = $_POST['odate'];
	$order_temp_sql = "select * from order_temp";
	$result = mysqli_query($cn, $order_temp_sql);
	$data = mysqli_fetch_array($result);
	if($data)
	{

		$tableno = $data['tableno'];

		echo $ordate;
		echo "<br/>".$tableno;

		$sql_order = "insert into orders(tableno, odate) values ($tableno, '$ordate')";
		if(mysqli_query($cn,$sql_order))
		{
			$order_no = mysqli_insert_id($cn);
		}

		echo "<br/>".$order_no;
		foreach ($result as $key)
		{
			$pname = $key['pname'];
			$qty = $key['qty'];
			$price = $key['price'];
			$sql_order_details = "insert into orderdetails(oid,pname,qty,rate) values ($order_no,'$pname',$qty,$price)";
			$sql_order_details_store = mysqli_query($cn,$sql_order_details);
			
		}
	} 
	$order_delete = "delete from order_temp";
	mysqli_query($cn,$order_delete);
	mysqli_close($cn);
}

include('footer.php'); ?>