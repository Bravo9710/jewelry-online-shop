<?php
	include 'database_connect.php';

	if(isset($_POST['send-order']))	{
		session_start();

		$userId = $_SESSION['userid'];

		$selectLastOrder = 'SELECT order_id FROM orders ORDER BY order_id DESC LIMIT 1';
		$result = mysqli_query($databaseConnect, $selectLastOrder);
		$row = mysqli_fetch_array($result);

		if($row !== null) {
			$lastOrderId = $row['order_id'];
			$newOrderId = $lastOrderId + 1;
		} else {
			$newOrderId = 1;
		}

		for ($i=0; $i < count($_SESSION['cart']); $i++) { 
			$productId = $_SESSION['cart'][$i]['product_id'];
			$productColor = $_SESSION['cart'][$i]['product_color'];
			$productCount = $_SESSION['cart'][$i]['count'];


			$sql = "INSERT INTO orders (order_id, user_id, purchase_item_id, purchase_item_color, count, status) 
			VALUES ('$newOrderId', '$userId', '$productId', '$productColor', '$productCount', 'pending')";

			$databaseConnect->query($sql);
		}

		$_SESSION['cart'] = array();

		header("location: ../profile.php");
	}
?>


