<?php
include('header.php');
include('testsession.php');
include('timesession.php');
include_once('../connection.php');
$pname = $_GET['pname'];

$sql = "delete from order_temp where pname = '$pname'";
$res = mysqli_query($cn,$sql);
if($res)
{
	echo" record deleted successfully";
}
else
{
	echo "failed";
}
?>

<script type="text/javascript">
	var timer = setTimeout(function()
	{
		window.location='mainorder.php'
	},2000);
</script>