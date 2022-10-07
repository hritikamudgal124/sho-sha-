<?php
include('header.php');
include('testsession.php');
include('timesession.php');
include_once('../connection.php');
$sql= "select * from bills";
$r = mysqli_query($cn,$sql);

?>
<table class="table table-active">
	<tr>
		<th>Cname</th>
		<th>Tableno</th>
		<th>Pname</th>
		<th>Quantity</th>
		<th>Rate</th>
		<th>Total</th>
		<th>Actions</th>
	</tr>

<?php 
	
	foreach ($r as $list)
	{
		echo "<tr>";
		echo"<td>".$list['cname']."</td> &nbsp;&nbsp;";
		echo"<td>".$list['tableno']."</td> &nbsp;&nbsp;";
		echo"<td>".$list['pname']."</td> &nbsp;&nbsp;";
		echo"<td>".$list['quantity']."</td> &nbsp;&nbsp;";
		echo"<td>".$list['rate']."</td> &nbsp;&nbsp;";
		echo"<td>".$list['total']."</td> &nbsp;&nbsp;";

		echo "<td><a href='pdf_bills.php?oid=".$list['billid'];
		echo " 'class='btn btn-primary'>Print Bill</a></td>";

		echo "</tr>";
	}
 ?>
</table>
