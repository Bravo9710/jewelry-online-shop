<?php
	if(isset($_POST['login-submit'])){
		include 'database_connect.php';

		$email = $_POST['email'];
		$password = $_POST['password'];

		$sqlQuery = "SELECT * FROM users WHERE email=?";
		$statement = mysqli_stmt_init($databaseConnect);

		if (!mysqli_stmt_prepare($statement, $sqlQuery)){ 
			header("location: ../signin-page.php?error=sqlError");
			exit();
		} else {
			mysqli_stmt_bind_param($statement, "s", $email);
			mysqli_stmt_execute($statement);
			$result = mysqli_stmt_get_result($statement);

			$row = mysqli_fetch_assoc($result);
			
			//Проверка дали $result има стойности от базата данни
			if($row){

				$pwdCheck = password_verify($password, $row['password']);
				
				if ($pwdCheck == false){
					header("location: ../signin-page.php?error=wrngPwd");
					exit(); 
				} else if ($pwdCheck == true){

					session_start();
					$_SESSION['userid'] = $row['id'];
					$_SESSION['firstname'] = $row['firstname'];
					$_SESSION['lastname'] = $row['lastname'];

					$cart = [];
					$_SESSION['cart'] = $cart;

					header("location: ../index.php");
					
					exit(); 
				} else {
					header("location: ../signin-page.php?error=wrngPwd");
					exit(); 
				}

			} else {
				header("location: ../signin-page.php?error=noUser");
				exit();
			}
		}

	} else {
		header("location: index.php");
		exit(); 
	}
?>
