<?php
$ctime = time();
if($ctime - $_SESSION['time_stamp'] > (3600))
{
	header('Location:../logout.php');
}
