<?php
	include 'database_connect.php';

	$sql_query ="CREATE TABLE userss (
		id INT(13) NOT NULL,
		firstname VARCHAR(32) DEFAULT NULL,
		lastname VARCHAR(30) DEFAULT NULL,
		email VARCHAR(32) DEFAULT NULL,
		password VARCHAR(30) DEFAULT NULL,
		address VARCHAR(30) DEFAULT NULL,
		PRIMARY KEY (id)
	) ENGINE=INNODB DEFAULT CHARSET=utf8";

	$result = mysqli_query($databaseConnect, $sql_query);

	if(!$result) {
		die('Error creating table');
	} else {
		echo "Table is created";
	}
?>

