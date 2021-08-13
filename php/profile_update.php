<?php
	if(isset($_POST['submit']))
	{
		include 'database_connect.php';
		session_start();

		$userid           = $_SESSION['userid'];
		$email            = $_POST["email"]; 
		$firstname        = $_POST["name"];
		$lastname         = $_POST["lastName"]; 
		$password         = $_POST["password"]; 
		$password2        = $_POST["password2"];
		$new_password     = $_POST["newPassword"];
		$address          = $_POST["address"];

		if($new_password ==""){
			$new_password = $_POST["password"]; 
		}

		//Проверка за съвпадение на паролите
		if ($password !== $password2){
			header("location: ../profile.php?error=pwdCheck");
			exit();
		} else {

			$sqlQuery ="SELECT * FROM users WHERE id='$userid'";
			$statement = mysqli_stmt_init($databaseConnect);

			if (!mysqli_stmt_prepare($statement, $sqlQuery)){ //Проверка за гешка в заявката
				header("location: ../profile.php?error=sqlError");
				exit();  
			}
			else {
				mysqli_stmt_bind_param($statement, "i", $userid);
				mysqli_stmt_execute($statement);
				$result = mysqli_stmt_get_result($statement);

				//Проверка дали $result има стойности от базата данни
				if($row = mysqli_fetch_assoc($result)){

					//Сравнява въведената парола и таз от базата данни
					$pwdCheck = password_verify($password, $row['password']);
					if ($pwdCheck == false){
						header("location: ../profile.php?error=wrngPwd");
						exit(); 
					} else if ($pwdCheck == true){
						$sqlQuery = "UPDATE users SET email=?, firstname=?, lastname=?, password=?, address=? WHERE id='$userid'"; // ?(place holder) for security (Prepare statements)
						$statement = mysqli_stmt_init($databaseConnect);
						if (!mysqli_stmt_prepare($statement, $sqlQuery)){ //Проверка за гешка в заявката 
							header("location: ../profile.php?error=sqlError");
							exit();  
						} else {
							$cryptedPassword = password_hash($new_password, PASSWORD_DEFAULT); //Криптиране на паролата

							mysqli_stmt_bind_param($statement, "sssss", $email, $firstname, $lastname, $cryptedPassword, $address); //Взима данните от потребителя и ги задава към $statement
							mysqli_stmt_execute($statement); //execute $statement to database
							header("location: ../profile.php?update=complete");
							exit();
						}
					}
				}
			}
			mysqli_stmt_close($statement);
			mysqli_close($databaseConnect);
		}
	}

?>
