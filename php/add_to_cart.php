<?php
	include 'database_connect.php';

	if(isset($_POST['add-to-cart'])) {

		$productId = $_POST['product'];
		$productColor = $_POST['color']; 
		$count = $_POST['counter']; 

		$newProduct = array('product_id' => $productId, 'count' => $count, 'product_color' => $productColor);

		session_start();
		// echo count($_SESSION['cart']);
		//array_push($_SESSION['cart'], $newProduct);

		if (count($_SESSION['cart']) == 0){
			array_push($_SESSION['cart'], $newProduct);
		} else if (count($_SESSION['cart']) > 0) {
			//echo 'before for: '.count($_SESSION['cart']);
			// echo '<br>';

			// foreach ($_SESSION['cart'] as $cartIndex) {
			// 	if(!array_search($newProduct['product_id'], $cartIndex)) {
			// 		array_push($_SESSION['cart'], $newProduct);
			// 		break;
			// 	} else {
			// 	print_r($cartIndex);

			// 	// }
			// }

			// for ($i=0; $i < count($_SESSION['cart']); $i++) { 
			// 	if(array_search($newProduct['product_id'], $_SESSION['cart'][$i])) {
			// 		if (array_search($newProduct['product_color'], $_SESSION['cart'][$i])) {
			// 			//echo '<br>count: '.$_SESSION['cart'][$i]['count'];
			// 			$_SESSION['cart'][$i]['count'] += $newProduct['count'];
			// 		} else {
			// 			array_push($_SESSION['cart'], $newProduct);
			// 		}
			// 		// echo '<br>'.array_search($newProduct['product_id'], $_SESSION['cart'][$i]);
			// 	} else {
			// 		array_push($_SESSION['cart'], $newProduct);
			// 	}

			// 	// echo '<br>new id: '.$newProduct['product_id'];
			// 	// echo '<br>old id: '.$_SESSION['cart'][$i]['product_id'];
			// 	// if($newProduct['product_id'] == $_SESSION['cart'][$i]['product_id'] && $newProduct['product_color'] == $_SESSION['cart'][$i]['product_color']) {
			// 	// 		$_SESSION['cart'][$i]['count'] += $newProduct['count'];

			// 			// echo '<br>updated count: '.$_SESSION['cart'][$i]['count'];
			// 			// return;
			// 		// } else {
			// 		// 	array_push($_SESSION['cart'], $newProduct);
			// 		// }
			// 	// } else {

			// 		// array_push($_SESSION['cart'], $newProduct);
			// 	// }
			// 	// echo '<br>new id: '.$newProduct['product_id'];
			// }
		}
	}
	// header("location: ../product.php?product=$productId");
?>
<!-- 

if($newProduct['product_id'] == $_SESSION['cart'][$i]['product_id']) {
					// echo '<br>new color: '.$newProduct['product_color'];
					// echo '<br>old color: '.$_SESSION['cart'][$i]['product_color'];

					if($newProduct['product_color'] == $_SESSION['cart'][$i]['product_color']) {
						// echo '<br>new count: '.$newProduct['count'];
						// echo '<br>old count: '.$_SESSION['cart'][$i]['count']; -->
