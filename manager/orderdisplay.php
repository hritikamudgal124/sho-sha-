<?php
include('header.php');
include_once('../connection.php');
$sql= "select * from orders order by odate desc";
$r = mysqli_query($cn,$sql); 
?>

<table class="table table-bordered table-striped">
	<tr>
		<th>Order date</th>
		<th>Order No.</th>
		<th>Table No.</th>
		<th colspan="3" align="center">Actions</th>
	</tr>
	<?php
		foreach($r as $data)
		{
			echo "<tr>";
			echo "<td>".$data['odate']."</td>";
			echo "<td>".$data['oid']."</td>";
			echo "<td>".$data['tableno']."</td>";

			echo "<td><a href='orderinfo.php?oid=".$data['oid'];
			echo " 'class='btn btn-warning'>Order Info</a>";
			if($data['billstatus']!=1)
			{
			echo "<td><a href='add_order.php?oid=".$data['oid'];
			echo " 'class='btn btn-info'>Order Add</a>";
			}
			else
			{
			echo "<td><a href='pdf_mainbills.php?oid=".$data['oid'];
			echo " 'class='btn btn-primary'>Create Bills</a>";
			}
			echo "</tr>";
		}
	?>
</table>