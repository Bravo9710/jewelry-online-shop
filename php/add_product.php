<?php

include 'database_connect.php';

if(isset($_POST['submit'])) {

	$name        = $_POST['name']; 
	$price       = $_POST['price'];
	$category    = $_POST['category'];
	$imageGold   = $_POST['image-gold'];
	$imageSilver = $_POST['image-silver'];
	$description = $_POST['description'];

	if(isset($_POST['gold'])) {
		$gold = 'Gold';
	} else {
		$gold = false;
	}

	if(isset($_POST['silver'])) {
		$silver = 'Silver';
	} else {
		$silver = false;
	}

	if(!!$gold && !!$silver) {
		$colors = $gold .', '. $silver;
	} else if (!!$gold) {
		$colors = $gold;
	} else if (!!$silver) {
		$colors = $silver;
	}

	if(!isset($_POST['image-gold'])) {
		$imageGold = false;
	}

	if(!isset($_POST['image-silver'])) {
		$imageSilver = false;
	}

	if(!!$imageGold && !!$imageSilver) {
		$images = $imageGold .', '. $imageSilver;
	} else if (!!$imageGold) {
		$images = $imageGold;
	} else if (!!$imageSilver) {
		$images = $imageSilver;
	}

	$sql = "INSERT INTO products (Name, Category_id, Price, Colors, Image, Description) 
	VALUES ('$name', '$category', '$price', '$colors', '$images', '$description')";

	if ($databaseConnect->query($sql) === TRUE) {
		header("location: ../admin-products.php?upload=complete");
		exit();
	} else {
		header("location: ../admin-products.php?error=sqlError");
		exit();
	}
}
?>
