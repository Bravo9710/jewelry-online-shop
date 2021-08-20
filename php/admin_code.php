<?php
	if(isset($_POST['admin-submit'])){
		include 'database_connect.php';

		$admin = $_POST['admin'];
		$password = $_POST['password'];

		$sqlQuery = "SELECT * FROM admin WHERE admin=?";
		$statement = mysqli_stmt_init($databaseConnect);

		if (!mysqli_stmt_prepare($statement, $sqlQuery)){ 
			header("location: ../admin-login.php?error=sqlError");
			exit();
		} else {
			mysqli_stmt_bind_param($statement, "s", $admin);
			mysqli_stmt_execute($statement);
			$result = mysqli_stmt_get_result($statement);

			$row = mysqli_fetch_assoc($result);
			
			//Проверка дали $result има стойности от базата данни
			if($row){

				$pwdCheck = password_verify($password, $row['admin_password']);
				
				if ($pwdCheck == false){
					header("location: ../admin-login.php?error=wrngPwd");
					exit(); 
				} else if ($pwdCheck == true){

					session_start();
					$_SESSION['userid'] = $row['id'];
					$_SESSION['firstname'] = $row['firstname'];
					$_SESSION['lastname'] = $row['lastname'];

					header("location: ../admin-page.php");
					
					exit(); 
				} else {
					header("location: ../admin-login.php?error=wrngPwd");
					exit(); 
				}

			} else {
				header("location: ../admin-login.php?error=noUser");
				exit();
			}
		}

	} else {
		header("location: ../index.php");
		exit(); 
	}
?>
