<?php
include('header.php');
 include('testsession.php');
include('timesession.php');
include_once('../connection.php');
error_reporting(0);
$oid = $_GET['oid'];
$sql = "select * from orders inner join orderdetails on orders.oid = orderdetails.oid where orders.oid=$oid ";
$r = mysqli_query($cn,$sql);
$orderinfo = mysqli_fetch_array($r);
?>
<div>
	<table class="table table-active">
		<th>Order No. - <?php echo $oid; ?></th>
		<th>Order Date - <?php echo $orderinfo['odate']; ?> </th>
		<th>Table No. - <?php echo $orderinfo['tableno']; ?></th>
	</table>
</div>
<table class="table table-active">
	<tr>
		<th>Sr no.</th>
		<th>Product Name</th>
		<th>Qty</th>
		<th>Rate</th>
	</tr>

<?php
foreach ($r as $data)
{
	echo "<tr>";
	echo "<td>1</td>";
	echo "<td>".$data['pname']."</td>";
	echo "<td>".$data['qty']."</td>";
	echo "<td>".$data['rate']."</td>";
	echo "</tr>";
}
?>
</table>

<form action="" method="post">
	<label>ENTER CUSTOMER NAME</label>
	<input type="text" name="cname">
	<input type="submit" name="submit" value="Create Bill" class="btn btn-info ">	
</form>

<?php
	if(isset($_POST['submit']))
	{
		$cname = $_POST['cname'];
		$sql_upd = "update orders set cname = '$cname',billstatus=1 where oid = $oid";
		$upd = mysqli_query($cn,$sql_upd);
		?>
		<script type="text/javascript">
			var timer = setTimeout(function()
			{
				window.location='orderlist_bills.php'
			},1000);
		</script>
	<?php
	}
?>

<?php
include('footer.php');
?>