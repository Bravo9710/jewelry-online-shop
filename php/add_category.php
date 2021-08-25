<?php

include 'database_connect.php';

if(isset($_POST['submit'])) {

	$category = $_POST['category']; 

	$sql = "INSERT INTO category (category_name) 
	VALUES ('$category')";

	if ($databaseConnect->query($sql) === TRUE) {
		header("location: ../admin-categories.php?addCategory=complete");
		exit();
	} else {
		header("location: ../admin-categories.php?error=sqlError");
		exit();
	}
}
?>
