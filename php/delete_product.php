<?php
	include 'database_connect.php';

	if(isset($_POST['delete']))	{
		$productId = $_POST['delete'];
		$sql = "DELETE FROM products WHERE id='$productId'";
		$result = mysqli_query($databaseConnect, $sql);
		
		header("location: ../admin-products.php?deleteP=complete");
		exit(); 
	}
?>
