<?php
	$host= 'localhost';
	$databaseUser= 'root';
	$databasePass= '';
	$databaseName='online_jewellery_store';
	$databaseConnect = mysqli_connect($host, $databaseUser, $databasePass);

	if (!$databaseConnect) {
		die("Can't connect");
	}

	if (!mysqli_select_db($databaseConnect, $databaseName)) {
		die("Can't select database");
	}

	mysqli_query($databaseConnect,"SET NAMES 'UTF8'");
?>
