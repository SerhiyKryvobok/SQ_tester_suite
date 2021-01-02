<html>
	<body>
	<?php
		echo "<h1>SQL tester suite</h1>";
		$link = mysqli_connect("localhost", "root", "root", "my_db");
		if ($link == false){
			print("Error connection" . mysqli_connect_error());	
		} else{
			print("Connection successful");
		}
		
	?>
<!--	<form action="create_tb.php">
//		<input type="submit" value="Создать таблицу">
//	</form>
-->	<form method="post">
		<input type="submit" name="create_tb" value="Создать таблицы Cus_mai Cus_ph ">
		<input type="submit" name="drop_tb" value="Удалить таблицы Cus_mai Cus_ph ">
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
		$sql_drop = "DROP TABLE Cus_mai, Cus_ph;";
		if(isset($_POST['create_tb'])){
			if(($link->query($sql_mai))and($link->query($sql_ph)) === TRUE){
				echo "Both tables created!";
			} else {
				echo "Error creating tables: " . $link->error;
			}
		}
		if(isset($_POST['drop_tb'])){
			if(($link->query($sql_drop)) === TRUE){
				echo "Both tables droped!";
			} else {
				echo "Error droping tables: " . $link->error;
			}
		}
		$link->close();
	?>
	</body>
</html>