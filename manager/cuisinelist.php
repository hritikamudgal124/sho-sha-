<?php
include('header.php');
 include('testsession.php');
include('timesession.php');
include_once('../connection.php');
?>
<body>
	<p style=" margin-top:10px;text-align: center; font-size: 35px; ">OUR SPECIALIZATIONS</p>

<table class="table table-active">
	<tr>
		<th>Photos</th>
		<th>Cuisine </th>
		<th>courses</th>
		<th>Price</th>
		<th colspan="2">Actions</th>
	</tr>
</body>
	<?php
		$sql = "select * from mainmenu order by courses";
		$res = mysqli_query($cn,$sql);
		foreach($res as $list)
		{
			echo "<tr>";
			echo "<td><img src ='uploadedfiles/".$list['p_image']."' class='photo'></td>";
			echo "<td>".$list['products']."</td>";
			echo "<td>".$list['courses']."</td>";
			echo "<td>".$list['price']."</td>";
			echo "<td><a href='edit.php?mid=".$list['mid']; 
			echo "'class='btn btn-info'>Edit</a></td>";
			echo "<td><a href='delete.php?mid=".$list['mid']; 
			echo "'class='btn btn-primary' onclick = 'return del_alert();'>Delete</a></td>";
			
			echo "</tr>";
		}
	?>

	<script type="text/javascript">
		function del_alert()
		{
			return confirm('Are you sure?');
		}
	</script>
</table>