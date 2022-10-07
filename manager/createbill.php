<script type="text/javascript">
	function cal()
	{
		var qty = parseInt(document.getElementById('qty').value);
		var rate = parseFloat(document.getElementById('rate').value);
		var total = qty * rate;
		document.getElementById('total').value = total;
	}
</script>

<?php
include('header.php');
 include('testsession.php');
include('timesession.php');
include_once('../connection.php');
$oid = $_GET['oid'];
$sql = "select * from porders where oid=$oid";
$r = mysqli_query($cn,$sql);
$data = mysqli_fetch_array($r);
?>

<div class="detail">
	<div style="margin-top: -50px;">
	<h3>SHO-SHA</h3>
	<h2 style="border-bottom: 2px solid #5c0a05;">HOPE YOU LIKED OUR SERVICE ,HOPE TO SEE YOU AGAIN.</h2>
	</div>
	<form action="" method="post" style="margin-top: 30px;">
		<label>CUSTOMER'S NAME</label>&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="cname"/><br/><br/>

		<label>TABLE NO.</label>&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="tblno" value="<?php echo $data['tableno']; ?>" readonly="true" /><br/><br/>

		<label>PRODUCT</label>&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="pname" value="<?php echo $data['pname'];?>" readonly="true"/> <br/><br/>

		<label>QUANTITY</label>&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="qty" id="qty" value="<?php echo $data['quantity'];?>" readonly="true"/><br/><br/>

		<label>RATE</label>&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="rate" id="rate" /><br/><br/>

		<label>TOTAL</label>&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="total" id="total" onkeydown="cal();" value="0" readonly="true" /><br/><br/>

		<input type="submit" name="gen" value="generate bill"/>

	</form>
</div>

<?php
if (isset($_POST['gen']))
 {
	$cname = $_POST['cname'];
	$tblno = $_POST['tblno'];
	$pname = $_POST['pname'];
	$qty = $_POST['qty'];
	$rate = $_POST['rate'];
	$total = $_POST['total'];

	$sql_ins = "insert into bills(cname,tableno,pname,quantity,rate,total) values ('$cname',$tblno,'$pname',$qty,$rate,$total)";
	$res = mysqli_query($cn,$sql_ins);
	if($res)
	{
		//update order table for bill gen.
		$sql_upd = "update porders set billstatus=1 where oid=
		$oid";
		mysqli_query($cn,$sql_upd);
		header('location:paidbills.php');
	}
	mysqli_close($cn);
}
?>