<?php
	include 'database_connect.php';

	if(isset($_POST['delete']))	{
		$categoryId = $_POST['delete'];

		$sql = "DELETE FROM category WHERE category_id='$categoryId'";

		$result = mysqli_query($databaseConnect, $sql);
		
		header("location: ../admin-categories.php?deleteCategory=complete");
		exit(); 
	}
?>
