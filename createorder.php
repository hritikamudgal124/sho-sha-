<?php

include('mheader.php');
include('../connection.php');
$sql = "select * from mainmenu order by products";
$r = mysqli_query($con, $sql);
?>

<br/><br/><br/><br/><br/><br/>
<div style="margin-left: 25px;">
<form action="" method="post">
	<input type="text" name="odate" /><br/>

	<select name="tblno">
	  <option>Table Number</option>
	  <option value="1">1</option>
	  <option value="2">2</option>
	  <option value="3">3</option>
	  <option value="4">4</option>
	  <option value="5">5</option>
	</select>
	<br/>
	<label>Select Product </label>
	<br/>
	<select name="pname">
		<?php 
			foreach ($r as $list) {
				echo "<option value=".$list['products'].">".$list['products']."</option>";
			}
		?>
	</select>
	<br/>
	<label>Rate</label>
	<br/>
	<input type="text" name="rate">
	<br/>
	<label>Qty</label>
	<br/>
	<input type="text" name="qty">
	<br/><br/>
	<input type="submit" name="submit" value="Add">
	<br/>
	<input type="submit" name="placeorder" value="Finish">

</form>
</div>

<div style="margin-left: 25px;">
	<table class="table table-bordered">
	<tr>
		<th>Product Name</th>
		<th>Qty</th>
		<th>Price</th>
		<th>Action</th>
	</tr>
	<?php
	$sql = "select * from order_temp";
	$r = mysqli_query($con, $sql);
	foreach ($r as $list) {
		echo "<tr>";
		echo "<td>".$list['pname']."</td>";
		echo "<td>".$list['qty']."</td>";
		echo "<td>".$list['price']."</td>";
		echo "<td><a href='orderdel.php?pname=".$list['pname'];
		echo "' class='btn btn-danger'onclick='return del_alert();'> Del</a></td>";
		echo "</tr>";
	}
	?>

<script type="text/javascript">
	function del_alert(){
		return confirm('Are you sure?');
	}
</script>

</table>



</div>


<?php 
	if(isset($_POST['submit']))
	{
		$pname = $_POST['pname'];
		$qty = $_POST['qty'];
		$tbl = $_POST['tblno'];
		$rate = $_POST['rate'];
		$sql_ins = "insert into order_temp(pname, qty, tableno, price)values('$pname',$qty,$tbl, $rate)";
		$sendorder = mysqli_query($con,$sql_ins);
		if($sendorder)
		{
			?>
			<script type="text/javascript">
		      var timer = setTimeout(function()
		      {
		        window.location='createorder.php'
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
	$result = mysqli_query($con,$order_temp_sql);
	$data = mysqli_fetch_array($result);
	if($data)
	{
		$tableno = $data['tableno'];

		echo $ordate;
		echo "<br/>".$tableno;

		$sql_order = "insert into orders(tblno, odate) values ($tableno, '$ordate') ";
		if(mysqli_query($con,$sql_order))
		{
			$order_no = mysqli_insert_id($con);
			
		}
		
		echo "<br/>".$order_no;
		foreach ($result as $key) {
			$pname = $key['pname'];
			$qty = $key['qty'];
			$price = $key['price'];
			$sql_order_details = "insert into orderdetails(oid, pname, qty, rate) values($order_no, '$pname', $qty, $price )";
			$sql_order_details_store = mysqli_query($con,$sql_order_details);
		}


	}
}


include('mfooter.php');
?>



