<?php
session_start();
$ssn = $_SESSION['ssuser'];
$sst = $_SESSION['time_stamp'];
$tt = time();

if($tt - $sst > 60)
{
	header('Location:../login.php');
}
if(!$ssn)
{
	header('Location:../login.php');
}
?>