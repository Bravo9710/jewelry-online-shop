<?php
	include 'database_connect.php';

	if(isset($_POST['remove']))	{
		$product = $_POST['remove'];

		session_start();
		array_splice($_SESSION['cart'], $product, 1);
		
		header("location: ../cart.php");
		exit(); 
	}
?>
