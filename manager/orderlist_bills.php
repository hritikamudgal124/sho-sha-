<?php
include('header.php');
include_once('../connection.php');
$sql = "select * from orders where billstatus=1";
$r = mysqli_query($cn,$sql);
?>

<table class="table table-active">
	<tr>
		<th>Order Date</th>
		<th>Order No.</th>
		<th>Table No.</th>
		<th>Customer Name</th>
		<th>Actions</th>
	</tr>

	<?php
		foreach ($r as $data)
		{
			echo "<tr>";
			echo "<td>".$data['odate']."</td>";
			echo "<td>".$data['oid']."</td>";
			echo "<td>".$data['tableno']."</td>";
			echo "<td>".$data['cname']."</td>";

			echo "<td><a href='pdf_mainbills?oid=".$data['oid'];
			echo " 'class='btn btn-primary'>Print Bill</a></td>";

			echo "</tr>";
		}
	?>
</table>