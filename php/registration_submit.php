<?php
	if(isset($_POST['submit'])){
		include 'database_connect.php';

		$email = $_POST['email']; 
		$firstname = $_POST['name'];
		$lastname = $_POST['lastName'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		$address = $_POST['address'];

		//Проверка за съвпадение на паролите
		if ($password !== $password2){
			header("location: ../register-page.php?error=pwdCheck&mail="); 
			exit();
		}
		
		else {
			//Проверка за вече съществуващ email
			$sqlQuery = "SELECT email FROM users WHERE email=?"; // ?(place holder) for security(Prepare statements)
			$statement = mysqli_stmt_init($databaseConnect);
			if (!mysqli_stmt_prepare($statement, $sqlQuery)){ //Проверка за гешка в заявката
				header("location: ../register-page.php?error=sqlError");
				exit();
			}
			else {
				mysqli_stmt_bind_param($statement, "s", $email); //Взима данните от потребителя и ги задава към $statement
				mysqli_stmt_execute($statement); //execute $statement to database
				mysqli_stmt_store_result($statement); //get result from database and store it in $statement 
				$resultCheck = mysqli_stmt_num_rows($statement); //Проверява колко съвпадения има на записа 
				
				if ($resultCheck > 0) {
					header("location: ../register-page.php?error=emailtaken&mail=");
					exit();
				}
				else {
					$sqlQuery= "INSERT INTO users (email, firstname, lastname, password, address)
							VALUES (?, ?, ?, ?, ?)";
					$statement = mysqli_stmt_init($databaseConnect);

					if (!mysqli_stmt_prepare($statement, $sqlQuery)){ //Проверка за гешка в заявката
						header("location: ../register-page.php?error=sqlError");
						exit();
					}
					else {
						$cryptedPwd = password_hash($password, PASSWORD_DEFAULT); //Криптиране на паролата

						mysqli_stmt_bind_param($statement, "sssss", $email, $firstname, $lastname, 
						$cryptedPwd, $address); //Взима данните от потребителя и ги задава към $statement
						mysqli_stmt_execute($statement); //execute $statement to database
						header("location: ../register-page.php?register=complete");
						exit();
					}

				}
			}
			mysqli_stmt_close($statement);
			mysqli_close($databaseConnect);

		}
	}else {
		header("location: ../register-page.php");
		exit(); 
	}
?>
