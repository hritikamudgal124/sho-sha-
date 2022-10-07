<?php
include('header.php');
include('testsession.php');
include('timesession.php');
include_once('../connection.php');
$sql= "select tableno,oid from porders where billstatus=0";
$res = mysqli_query($cn,$sql);
?>
<table class="table table-active">
	<tr>
		<th>TABLE NO</th>
		<th>CREATE BILL</th>
	</tr>

	<?php 
	
	foreach ($res as $data)
	{
		echo "<tr>";
		echo"<td>".$data['tableno']."</td> &nbsp;&nbsp;";	
		echo "<td><a href='createbill.php?oid=".$data['oid'];
		echo " 'class='btn btn-outline-primary'>Create bill</a></td>";
		echo "</tr>";
	}
 ?>
</table>
