<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<?php
			$host = 'localhost'; //Машина, на която работи MySQL сървърът
			$databaseUser = 'root'; // Потребителско име за MySQL
			$databasePass = ''; // Парола за MySQL

			//връзка със сървъра
			
			if(!$databaseConnect = mysqli_connect($host, $databaseUser, $databasePass)) {
				die('Не може да се осъществи връзка със сървъра.');
			}

			$sqlQuery = 'CREATE Database online_jewellery_store';

			if ($queryResource = mysqli_query($databaseConnect, $sqlQuery)) {
				echo "Database created";
			} else {
				echo "Error creating database: ";
			}
		?>
	</body>
</html>
