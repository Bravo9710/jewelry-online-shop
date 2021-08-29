<?php
	include 'database_connect.php';

	session_start();

	if (isset($_SESSION['userid'])) {
		if(isset($_POST['add-to-cart'])) {

			$productId = $_POST['product'];
			$productColor = $_POST['color']; 
			$count = $_POST['counter']; 

			$newProduct = array('product_id' => $productId, 'count' => $count, 'product_color' => $productColor);
	
			if( empty( $_SESSION['cart'] ) ) {
				$_SESSION['cart'] = array();
			}

			$product_ids = array();
			if ( ! empty( $_SESSION['cart'] ) ) {
				foreach ( $_SESSION['cart'] as $product_item ) {
					$product_ids[] = $product_item["product_id"];
				}

			}

			if( array_search($newProduct['product_id'], $product_ids ) === false ) {
				array_push($_SESSION['cart'], $newProduct);
			} else {
				$is_new = true;
				for ($i=0; $i < count($_SESSION['cart']); $i++) { 
					if( $newProduct['product_id'] === $_SESSION['cart'][$i]['product_id'] ) {
						if ( $newProduct['product_color'] === $_SESSION['cart'][$i]['product_color'] ) {
							$_SESSION['cart'][$i]['count'] += $newProduct['count'];
							$is_new = false;
							break;
						} 
					} 
				}

				if ( $is_new ) {
					array_push($_SESSION['cart'], $newProduct);
				}
			}
		}
		header("location: ../product.php?product=$productId");
	} else {
		header("location: ../signin-page.php");
	}
?>
