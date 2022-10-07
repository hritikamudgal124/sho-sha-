<?php
	$hostname = "localhost";
	$usrname = "root";
	$pwd = "";
	$dbname = "cafe";

	$cn = mysqli_connect($hostname,$usrname,$pwd,$dbname) or die("connection failed");
?>