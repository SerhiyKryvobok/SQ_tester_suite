<html>
	<body>
	<?php
		echo "<h1>SQL tester suite</h1>";
		$link = mysqli_connect("localhost", "root", "root", "my_db")
			or die("Error connection" . mysqli_connect_error());
			if ($link) {
				echo "Connection successful!";
			}
		mysqli_close($link);	
	?>
<!--	<form action="create_tb.php">
//		<input type="submit" value="Создать таблицу">
//	</form>
-->	<form method="post">
		<input type="submit" name="create_tb" value="Создать таблицы Cus_mai Cus_ph ">
		<input type="submit" name="drop_tb" value="Удалить таблицы Cus_mai Cus_ph "></br>
		<input type="submit" name="fill_tb" value="Заполнение таблиц Cus_mai Cus_ph ">
		<input type="submit" name="show_tb" value="Вывод таблиц Cus_mai Cus_ph ">
	</form>	
	<?php
		$sql_mai = "CREATE TABLE Cus_mai (
		id INT(3) AUTO_INCREMENT PRIMARY KEY,
		name VARCHAR(30) NOT NULL,
		mail VARCHAR(30) NOT NULL,
		mailOrigin VARCHAR(10) NOT NULL
		)";
		$sql_ph = "CREATE TABLE Cus_ph (
		id INT(3) AUTO_INCREMENT PRIMARY KEY,
		name VARCHAR(30) NOT NULL,
		phone VARCHAR(30) NOT NULL,
		operator VARCHAR(30) NOT NULL
		)";
		$sql_drop = 'DROP TABLE Cus_mai, Cus_ph;';
		$sql_fill = "INSERT INTO Cus_mai (name, mail, mailOrigin)
		VALUES ('Jonh Dou', 'jd@mail.eu', 'EU');";
		$sql_fill .= "INSERT INTO Cus_mai (name, mail, mailOrigin)
		VALUES ('Chak Norris', 'cn@mail.com', 'INTER');";
		$sql_fill .= "INSERT INTO Cus_mai (name, mail, mailOrigin)
		VALUES ('Bill Murrey', 'bm@mail.com', 'INTER');";
		$sql_fill .= "INSERT INTO Cus_mai (name, mail, mailOrigin)
		VALUES ('Shakil O*neil', 'so@mail.eu', 'EU');";
		$sql_fill .= "INSERT INTO Cus_mai (name, mail, mailOrigin)
		VALUES ('Filip Morris', 'fm@mail.com', 'INTER');";
		$sql_fill .= "INSERT INTO Cus_mai (name, mail, mailOrigin)
		VALUES ('Clark Derbin', 'cd@mail.com', 'EU');";
		$sql_fill .= "INSERT INTO Cus_ph (name, phone, operator)
		VALUES ('Jonh Dou', '+10015002255', 'Tmobi');";
		$sql_fill .= "INSERT INTO Cus_ph (name, phone, operator)
		VALUES ('Chak Norris', '+10012001245', 'BusyNet');";
		$sql_fill .= "INSERT INTO Cus_ph (name, phone, operator)
		VALUES ('Bill Murrey', '+10012054566', 'BusyNet');";
		$sql_fill .= "INSERT INTO Cus_ph (name, phone, operator)
		VALUES ('Shakil O*neil', '+10012058842', 'BusyNet');";
		$sql_fill .= "INSERT INTO Cus_ph (name, phone, operator)
		VALUES ('Filip Morris', '+10015056648', 'Tmobi');";
		$sql_fill .= "INSERT INTO Cus_ph (name, phone, operator)
		VALUES ('Clark Derbin', '+10015052298', 'Tmobi');
		";
		$sql_show_mai = "SELECT * FROM Cus_mai ORDER by ID";
		$sql_show_ph= "SELECT * FROM Cus_ph ORDER by ID";
		if(isset($_POST['fill_tb'])){
			$i = 0;
			$link = mysqli_connect("localhost", "root", "root", "my_db")
				or die("Error connection" . mysqli_connect_error());
			if (mysqli_multi_query($link, $sql_fill)) echo 'Both tables fullfilled!';
			else echo 'Error fullfilling tables: ' . $link->error;
			mysqli_close($link);	
		}
		if(isset($_POST['show_tb'])){
			$link = mysqli_connect("localhost", "root", "root", "my_db")
				or die("Error connection" . mysqli_connect_error());
			if ($result = mysqli_query($link, $sql_show_mai)) {
				while ($row = mysqli_fetch_assoc($result)) {
					echo ($row['name'] .' '. $row['mail'] .' '. $row['mailOrigin'] . '</br>');
//					printf ("%s (%s) %s %s\n", $row['name'], $row['mail'], $row['mailOrigin'], '</br>');
				}
				mysqli_free_result($result);
				echo '-------------------------------</br>';
			}
			if ($result = mysqli_query($link, $sql_show_ph)) {
				while ($row = mysqli_fetch_assoc($result)) {
//					echo ($row['name'] .' '. $row['phone'] .' '. $row['operator'] . '</br>');
					printf ("%s (%s) %s %s\n", $row['name'], $row['phone'], $row['operator'], '</br>');
				}
				mysqli_free_result($result);
			}
			mysqli_close($link);	
		}
		if(isset($_POST['create_tb'])){
			$link = mysqli_connect("localhost", "root", "root", "my_db")
				or die("Error connection" . mysqli_connect_error());

			if ((mysqli_query($link, $sql_mai))and(mysqli_query($link, $sql_ph))) {
				echo 'Both tables created!';
			} else {
				echo 'Error creating tables: ' . $link->error;
			}
			mysqli_close($link);	
		}
		if(isset($_POST['drop_tb'])){
			$link = mysqli_connect("localhost", "root", "root", "my_db")
				or die("Error connection" . mysqli_connect_error());

			if (mysqli_query($link, $sql_drop)){
				echo 'Both tables droped!';
			} else {
				echo 'Error droping tables: ' . $link->error;
			}
			mysqli_close($link);	
		}
	?>
	</body>
</html>