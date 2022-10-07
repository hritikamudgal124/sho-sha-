<?php
include('header.php');
include('testsession.php');
include('timesession.php');
include_once('../connection.php');
$mid = $_GET['mid'];

$sql = "delete from mainmenu where mid = $mid";
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
		window.location='cuisinelist.php'
	},2000);
</script>