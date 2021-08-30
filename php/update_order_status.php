<?php
	include 'database_connect.php';

	if(isset($_POST['update']))	{
		$orderId = $_POST['update'];
		$orderNewStatus = $_POST['status'];
		$sql = "UPDATE orders SET status = '$orderNewStatus' WHERE order_id=".$orderId;
		
		$result = mysqli_query($databaseConnect, $sql);
		
		header("location: ../admin-orders.php?update=complete");
		exit(); 
	}
?>
